<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $primaryKey = 'customerid';
    protected $fillable = [
        'package',
        'quantity',
        'payment_amount',
        'orderdate',
        'customername',
        'numberphone',
        'email',
    ];
}
