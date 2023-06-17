<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $primaryKey = 'paymentid';
    protected $fillable = [
        'customerid',
        'package',
        'quantity',
        'orderdate',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerid');
    }
}
