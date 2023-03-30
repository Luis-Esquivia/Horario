<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
    use HasFactory;
    protected $fillable = ['name','tipo','horas','malla_id'];
    public function resultados()
    {
        return $this->hasMany('App\Models\Resultado');
    }
    public function malla()
    {
        return $this->belongsTo('App\Models\Malla');
    }
    public function horarios()
    {
        return $this->hasMany('App\Models\Horario');
    }
}
