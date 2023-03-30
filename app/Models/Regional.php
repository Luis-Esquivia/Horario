<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regional extends Model
{
    use HasFactory;
    protected $fillable = ['id_regional', 'name'];

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
}
