<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
       use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'order_number',
        'status',
        'grand_total',
        'item_count',
        'is_paid',
        'payment_method',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'city',
        'country',
        'postal_code',
        'notes',
        'payment_transaction_id',
        'payment_status'
    ];

    protected $casts = [
        'is_paid' => 'boolean',
        'grand_total' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public static function generateOrderNumber()
    {
        return 'ORD-' . strtoupper(uniqid());
    }

    public function markAsPaid()
    {
        $this->update(['is_paid' => true, 'status' => 'processing']);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }
}
