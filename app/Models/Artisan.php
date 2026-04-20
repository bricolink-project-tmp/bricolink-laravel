<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artisan extends Model
{
    protected $primaryKey = 'artisan_id';
    public $incrementing = false;

    protected $fillable = [
        'artisan_id',
        'bio',
        'craft_type',
        'is_available',
        'cover_image_path',
        'profile_views',
    ];

    protected $casts = [
        'is_available' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'artisan_id', 'id');
    }

    public function portfolioImages()
    {
        return $this->hasMany(PortfolioImage::class, 'artisan_id', 'artisan_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'artisan_id', 'artisan_id');
    }
}
