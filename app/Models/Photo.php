<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['url'];
    use HasFactory;

    public function imageable()
    {
        return $this->morphTo();
    }
}
