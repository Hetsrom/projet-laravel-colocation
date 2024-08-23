<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offres extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'price', 'location', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function reviews()
    {
        return $this->hasMany(Avis::class);
    }
}


Reservation::all();
