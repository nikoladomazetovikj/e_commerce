<?php

namespace App\Models;

use App\Http\Controllers\SeedController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    public function seed()
    {
        return $this->belongsTo(SeedController::class);
    }

}
