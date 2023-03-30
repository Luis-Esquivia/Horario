<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;
    protected $fillable = ['document_type', 'document','name', 'lastname','birthday', 'residence_city','email','phone', 'contractor_type', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
