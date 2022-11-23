<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyPayment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'companies_payments';

    protected $fillable = [
      'company_id',
        'seed_id',
        'quantity',
        'total_price',
        'agreement',
        'agreement_date'
    ];
}
