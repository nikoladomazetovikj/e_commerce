<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'user_id',
        'seed_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
