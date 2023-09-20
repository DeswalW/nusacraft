<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'description',
        'image',
        'music',
        'marker',
        'model',
        'model_x',
        'model_y',
        'model_z',
        'model_rotation_x',
        'model_rotation_y',
        'model_rotation_z',
        'model_scale',
        'link'
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::creating(function (Product $product) {
            $product->slug = str($product->name)->slug();
        });
    }

    public function getPositionAttribute()
    {
        return "{$this->model_x} {$this->model_y} {$this->model_z}";
    }

    public function getRotationAttribute()
    {
        return "{$this->model_rotation_x} {$this->model_rotation_y} {$this->model_rotation_z}";
    }

    public function getScaleAttribute()
    {
        return "{$this->model_scale} {$this->model_scale} {$this->model_scale}";
    }
}
