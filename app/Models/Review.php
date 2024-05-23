<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['technology_id', 'author', 'rating', 'review'];

    public function technology()
    {
        return $this->belongsTo(Tecnologia::class);
    }
}
