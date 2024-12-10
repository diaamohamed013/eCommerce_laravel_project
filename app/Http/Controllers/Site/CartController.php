<?php

namespace App\Http\Controllers\Site;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Address;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        $this->validateDiscounts();
        $items = Cart::instance('cart')->content();
        return view('site.pages.shopping_cart', compact('items'));
    }

    public function addToCart(Request $request)
    {
        Cart::instance('cart')->add($request->id, $request->title, $request->stock_quantity, $request->price)->associate('App\Models\Product');
        // return redirect()->back();
        return response()->json([
            'status' => 'success',
            'message' => 'Product added to cart successfully!',
            'cartCount' => Cart::instance('cart')->content()->count(), // Optional: cart item count
        ]);
    }

    public function increase_cart_qty($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $stock = $product->model->stock_quantity; // Assuming the model has a 'stock' field

        // Check if stock is available
        if ($stock <= 0) {
            return redirect()->back()->with('error', 'Out of stock'); // Return error if out of stock
        }

        // If stock is available, increase the quantity
        $qty = $product->qty + 1;

        // Prevent going over stock
        if ($qty > $stock) {
            $qty = $stock; // Set quantity to max available stock
            $message = "The quantity has been adjusted to the available stock of " . $stock . "."; // Custom message
            Cart::instance('cart')->update($rowId, $qty); // Update the cart with adjusted quantity

            // Redirect with a success message
            return redirect()->back()->with('success', $message);
        }
        Cart::instance('cart')->update($rowId, $qty);
        return redirect()->back();
    }

    public function decrease_cart_qty($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        return redirect()->back();
    }

    public function remove_item($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $subtotal = (float) Cart::instance('cart')->subtotal();
        $tax = (float) Cart::instance('cart')->tax();
        $total = (float) Cart::instance('cart')->total();
        $count = Cart::instance('cart')->content()->count();
        $isEmpty = Cart::instance('cart')->content()->count() == 0;

        $discount = 0;
        $subtotalAfterDiscount = $subtotal;

        if (session()->has('discounts')) {
            $discount = (float) session('discounts')['discount'];
            $subtotalAfterDiscount = $subtotal - $discount;

            if ($subtotalAfterDiscount < 0) {
                $subtotalAfterDiscount = 0;
            }

            // Update session values
            session()->put('discounts', [
                'discount' => $discount,
                'subtotal' => $subtotalAfterDiscount,
                'tax' => $tax,
                'total' => $subtotalAfterDiscount + $tax,
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Product has been deleted.',
            'subtotal' => $subtotal,
            'tax' => $tax,
            'total' => $total,
            'discount' => $discount,
            'subtotalAfterDiscount' => $subtotalAfterDiscount,
            'count' => $count,
            'isEmpty' => $isEmpty,
        ]);
    }

    public function remove_cart()
    {
        Cart::instance('cart')->destroy();
        return response()->json([
            'status' => 'success',
            'message' => 'Cart has been cleared.'
        ]);
    }

    public function apply_coupon_code(Request $request)
    {
        $coupon_code = $request->coupon_code;
        if (isset($coupon_code)) {
            $coupon = Coupon::where('code', $coupon_code)->where('expire_date', '>=', Carbon::today())->where('cart_value', '<=', Cart::instance('cart')->subtotal())->first();
            if (!$coupon) {
                return back()->with('error', 'Invalid coupon code!');
            }
            session()->put('coupon', [
                'code' => $coupon->code,
                'type' => $coupon->type,
                'value' => $coupon->value,
                'cart_value' => $coupon->cart_value
            ]);
            $this->calculateDiscounts();
            return back()->with('success', 'Coupon code has been applied!');
        } else {
            return back()->with('error', 'Invalid coupon code!');
        }
    }

    public function calculateDiscounts()
    {
        $discount = 0;
        if (session()->has('coupon')) {
            if (session()->get('coupon')['type'] == 'fixed') {
                $discount = session()->get('coupon')['value'];
            } else {
                $discount = (Cart::instance('cart')->subtotal() * session()->get('coupon')['value']) / 100;
            }

            $subtotalAfterDiscount = Cart::instance('cart')->subtotal() - $discount;
            $taxAfterDiscount = ($subtotalAfterDiscount * config('cart.tax')) / 100;
            $totalAfterDiscount = $subtotalAfterDiscount + $taxAfterDiscount;

            session()->put('discounts', [
                'discount' => number_format(floatval($discount), 2, '.', ''),
                'subtotal' => number_format(floatval(Cart::instance('cart')->subtotal() - $discount), 2, '.', ''),
                'tax' => number_format(floatval((($subtotalAfterDiscount * config('cart.tax')) / 100)), 2, '.', ''),
                'total' => number_format(floatval($totalAfterDiscount), 2, '.', '')
            ]);
        }
    }

    public function validateDiscounts()
    {
        $subtotal = (float) Cart::instance('cart')->subtotal();
        $tax = (float) Cart::instance('cart')->tax();

        if (session()->has('discounts')) {
            $discount = (float) session('discounts')['discount'];
            $subtotalAfterDiscount = $subtotal - $discount;

            if ($subtotalAfterDiscount < 0) {
                $subtotalAfterDiscount = 0;
            }

            session()->put('discounts', [
                'discount' => $discount,
                'subtotal' => $subtotalAfterDiscount,
                'tax' => $tax,
                'total' => $subtotalAfterDiscount + $tax,
            ]);
        }
    }

    public function remove_coupon_code()
    {
        session()->forget('coupon');
        session()->forget('discounts');
        return back()->with('success', 'Coupon has been removed!');
    }

    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $address = Address::where('user_id', Auth::user()->id)->first();
        return view('site.pages.checkout', compact('address'));
    }

    public function place_order(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'country' => 'required',
            'city' => 'required',
            'street_address' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'mode' => 'required|in:cod,card,stripe',
        ]);


        $user_id = Auth::user()->id;
        $address = Address::where('user_id', $user_id)->first();

        if (!$address) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'country' => 'required',
                'city' => 'required',
                'street_address' => 'required',
                'state' => 'required',
                'zip' => 'required',
                'mode' => 'required|in:cod,card,stripe',

            ]);

            $address = new Address();
            $address->user_id = $user_id;
            $address->name = $request->name;
            $address->email = $request->email;
            $address->phone = $request->phone;
            $address->country = $request->country;
            $address->city = $request->city;
            $address->street_address = $request->street_address;
            $address->state = $request->state;
            $address->zip = $request->zip;
            $address->save();
        }

        $this->setAmountForCheckout();

        $order = new Order();
        $order->user_id = $user_id;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->country = $request->country;
        $order->city = $request->city;
        $order->street_address = $request->street_address;
        $order->state = $request->state;
        $order->zip = $request->zip;
        $order->order_number = 'ORDER-' . mt_rand(100000000, 999999999);
        $order->sub_total = Session::get('checkout')['subtotal'];
        $order->tax = Session::get('checkout')['tax'];
        $order->discount = Session::get('checkout')['discount'];
        $order->total = Session::get('checkout')['total'];
        $order->status = 'ordered';
        $order->payment_status = 'pending';
        $order->save();


        foreach (Cart::instance('cart')->content() as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item->id;
            $orderItem->quantity = $item->qty;
            $orderItem->price = $item->price;
            $orderItem->save();
        }

        if ($request->mode == 'card') {
            //
        } elseif ($request->mode == 'stripe') {
            //
        } elseif ($request->mode == 'cod') {
            $transaction = new Transaction();
            $transaction->order_id = $order->id;
            $transaction->user_id = $user_id;
            $transaction->mode = 'cod';
            $transaction->status = 'pending';
            $transaction->save();
        }
        Cart::instance('cart')->destroy();
        Session::forget('checkout');
        Session::forget('coupon');
        Session::forget('discounts');

        return redirect()->route('site.cart.order.success', $order->order_number);
    }

    // handle empty cart

    public function setAmountForCheckout()
    {
        if (Cart::instance('cart')->count() <= 0) {
            Session::forget('checkout');
            return redirect()->route('site.shop');
        }
        if (Session::has('coupon')) {
            Session::put('checkout', [
                'discount' => Session::get('discounts')['discount'],
                'subtotal' => Session::get('discounts')['subtotal'],
                'tax' => Session::get('discounts')['tax'],
                'total' => Session::get('discounts')['total'],
            ]);
        } else {
            Session::put('checkout', [
                'discount' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'tax' => Cart::instance('cart')->tax(),
                'total' => Cart::instance('cart')->total(),
            ]);
        }
    }

    public function orderSuccess()
    {
        $order = Order::where('order_number', request()->order_number)->first();
        return view('site.pages.order-success', compact('order'));
    }
}
