<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aprendiz extends Model
{
    use HasFactory;
    protected $fillable = ['document_type','document','name','lastname', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
