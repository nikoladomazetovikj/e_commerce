<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OnlinePayment extends Model
{
    use HasFactory, SoftDeletes, HasUlids;

    protected $table = 'online_payments';

    protected $primaryKey = null;

    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'seed_id',
        'quantity',
        'total_price',

    ];

    public function seeds()
    {
        return $this->belongsTo(Seed::class, 'id');
    }

}
