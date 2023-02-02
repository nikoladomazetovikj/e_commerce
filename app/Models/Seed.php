<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Seed extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'quantity',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sale()
    {
        return $this->hasOne(Sale::class);
    }

    public function rating()
    {
        return $this->hasMany(Rating::class, 'seed_id');
    }

    public function avgRating() : float
    {
        return DB::table('ratings')
            ->where('seed_id', $this->id)
            ->selectRaw('CAST(avg(review_score) AS decimal(12,2) ) as rate')
            ->value('rate');
    }

}
