<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    public static function makeCalendar($pag) {
        $calendar = [];
        $pag *= 10;
        for ($i = $pag; $i < $pag+10 ; $i++) { 
            $dia = [];
            $dia['dia'] = now()->addDays($i)->toDateString();
            switch(now()->addDays($i)->dayOfWeek) {
                case '0':
                    $dia['diaSemana'] = 'Domingo';
                break;
                case '1':
                    $dia['diaSemana'] = 'Lunes';
                break;
                case '2':
                    $dia['diaSemana'] = 'Martes';
                break;
                case '3':
                    $dia['diaSemana'] = 'Miercoles';
                break;
                case '4':
                    $dia['diaSemana'] = 'Jueves';
                break;
                case '5':
                    $dia['diaSemana'] = 'Viernes';
                break;
                case '6':
                    $dia['diaSemana'] = 'Sabado';
                break;
            }
            array_push($calendar, $dia);
        }
        return $calendar;
    }

    protected $guarded = []; 

    public function curso () {
        return $this->hasOne(Curso::class);
    }
}
