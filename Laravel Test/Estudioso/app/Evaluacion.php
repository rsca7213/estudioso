<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{

    protected $guarded = []; 

    public function curso () {
        return $this->hasOne(Curso::class);
    }
}
