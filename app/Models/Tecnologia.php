<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class Tecnologia extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'brand', 'model', 'categoria_id', 'price',
        'description', 'image', 'stock', 'rating'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->image? URL::to(Storage::disk('public')-> $this->image) : null;
    }
    
}
