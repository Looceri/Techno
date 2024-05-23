<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnologia extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'brand', 'model', 'category_id', 'price',
        'description', 'image', 'stock', 'rating'
    ];

    public function category()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
