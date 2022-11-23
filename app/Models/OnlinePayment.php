<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OnlinePayment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'online_payments';

    protected $fillable = [
        'user_id',
        'seed_id',
        'quantity',
        'total_price',

    ];
}
