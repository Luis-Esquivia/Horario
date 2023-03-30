<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    use HasFactory;
    protected $fillable = ['idficha','sede_id', 'state', 'ficha_start_date', 'ficha_end_date', 'programa_id', 'grupo'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    public function programa()
    {
        return $this->belongsTo('App\Models\Programa');
    }
    public function sede()
    {
        return $this->belongsTo('App\Models\Sede');
    }
    public function horarios()
    {
        return $this->hasMany('App\Models\Horario');
    }
}
