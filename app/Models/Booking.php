<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'artisan_id',
        'description',
        'image_path',
        'status',
        'scheduled_date',
        'rating',
        'review',
        'price',
        'final_terms',
    ];

    protected $casts = [
        'scheduled_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function artisan()
    {
        return $this->belongsTo(Artisan::class, 'artisan_id', 'artisan_id');
    }
}
