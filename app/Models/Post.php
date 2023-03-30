<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'descripcion', 'regional_id'];

    public function regional()
    {
        return $this->belongsTo('App\Models\Regional');
    }
    public function sedes()
    {
        return $this->hasMany('App\Models\Sede');
    }
}
