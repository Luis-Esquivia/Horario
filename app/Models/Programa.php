<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;
    protected $fillable = ['id_programa', 'program_name','sigla'];


    public function fichas()
    {
        return $this->hasMany('App\Models\Ficha');
    }
    public function mallas()
    {
        return $this->hasMany('App\Models\Malla');
    }
}
