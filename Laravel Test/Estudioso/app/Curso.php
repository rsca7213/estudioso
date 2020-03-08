<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    public function user () {
        return $this->hasOne(User::class);
    }

    public function evaluaciones () {
        return $this->hasMany(Evaluacion::class)->latest();
    }
}
