<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    protected $fillable = [
        'inicial',
        'final',
        'day',
        'ambiente_id',
        'user_id',
        'competencia_id',
        'ficha_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function competencia()
    {
        return $this->belongsTo('App\Models\Competencia');
    }
    public function ambiente()
    {
        return $this->belongsTo('App\Models\Ambiente');
    }
    public function ficha()
    {
        return $this->belongsTo('App\Models\Ficha');
    }
}
