<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Events\CategorySaving;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug',
    ];

    protected $dispatchesEvents = [
        'saving' => CategorySaving::class,
    ];

    /**
     * Get the images.
     */
    public function images()
    {
        // Category hasMany Image
        return $this->hasMany(Image::class);
    }
}
