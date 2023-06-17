<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';
    protected $primaryKey = 'eventid';
    protected $fillable = [
        'image_event',
        'name_event',
        'name',
        'granttime',
        'expiry',
        'price',
        'content',
    ];
}
