<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\technologies;

class categoria extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function technologies()
    {
        return $this->hasMany(technologies::class);
    }
}
