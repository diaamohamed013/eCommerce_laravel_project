<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'country',
        'city',
        'street_address',
        'state',
        'zip',
        'user_id',
        'order_number',
        'sub_total',
        'tax',
        'total',
        'status',
        'delivery_date',
        'cancelled_date',
        'payment_status',
        'payment_gateway_reference'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    
    public function transaction() 
    {
        return $this->hasOne(Transaction::class);
    }
}
