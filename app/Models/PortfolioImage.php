<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioImage extends Model
{
    protected $fillable = [
        'artisan_id',
        'image_path',
    ];

    public function artisan()
    {
        return $this->belongsTo(Artisan::class, 'artisan_id', 'artisan_id');
    }
}
