@extends('site.master')

@section('title', 'Chekout')

@section('sub_page', 'Checkout')

@section('content')

    @include('site.layouts.breadcrumb_inside')

    <!-- start section for confirmation order page -->
    <section class="checkorder py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="checkorder__content">
                        <h2>Thank you. Your order has been received.</h2>
                        <p>
                            Your order number is: <strong>{{ $order->id }}</strong>
                        </p>
                        <p>
                            You will receive an email confirmation shortly.
                        </p>
                        <p>
                            {{ $order->created_at }}
                        </p>
                        <p>
                            {{$order->transaction->mode}}
                            <br>
                            {{$order->transaction->transaction_id}}
                            <br>
                            {{$order->transaction->status}}
                        </p>
                        <p>
                            <a href="{{ route('site.home') }}" class="btn btn-primary">Back to Home</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
