<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // Add [mobile] to fillable property to allow mass assignment on [App\Models\Profile].
    protected $fillable=['mobile'];

    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
