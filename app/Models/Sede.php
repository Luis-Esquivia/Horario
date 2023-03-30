<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address','description', 'post_id'];

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
    public function ambientes()
    {
        return $this->hasMany('App\Models\Ambiente');
    }
    public function fichas()
    {
        return $this->hasMany('App\Models\Ficha');
    }
}
