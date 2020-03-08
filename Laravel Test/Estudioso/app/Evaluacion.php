<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    public function curso () {
        return $this->hasOne(Curso::class);
    }
}
