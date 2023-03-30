<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    use HasFactory;
    protected $fillable = ['descripcion','identificacion','competencia_id'];
    public function competencia()
    {
        return $this->belongsTo('App\Models\Competencia');
    }
}
