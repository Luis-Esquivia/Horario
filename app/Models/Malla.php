<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Malla extends Model
{
    use HasFactory;
    protected $fillable = ['programa_id','trimestre'];
    public function programa()
    {
        return $this->belongsTo('App\Models\Programa');
    }
    public function competencias()
    {
        return $this->hasMany('App\Models\Competencia');
    }
}
