<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $table = 'user_profile_details';

    protected $primaryKey = null;

    protected $fillable = [
        'user_id',
        'country',
        'city',
        'zip_code',
        'street',
        'phone_number'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
