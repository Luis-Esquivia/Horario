<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'sigla', 'sede_id'];

    public function sede()
    {
        return $this->belongsTo('App\Models\Sede');
    }
    public function horarios()
    {
        return $this->hasMany('App\Models\Horario');
    }
}
