<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'reference_id',
        'user_id',
        'artisan_id',
        'title',
        'description',
        'budget_range',
        'location',
        'image_path',
        'reference_images',
        'status',
        'scheduled_date',
        'rating',
        'review',
        'price',
        'final_terms',
    ];

    protected $casts = [
        'scheduled_date' => 'datetime',
        'reference_images' => 'array',
    ];

    protected static function booted()
    {
        static::creating(function ($booking) {
            if (empty($booking->reference_id)) {
                $booking->reference_id = '#BKL-' . strtoupper(\Illuminate\Support\Str::random(6));
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function artisan()
    {
        return $this->belongsTo(Artisan::class, 'artisan_id', 'artisan_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
