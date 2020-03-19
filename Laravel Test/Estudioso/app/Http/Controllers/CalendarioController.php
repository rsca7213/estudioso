<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Curso;
use App\Evaluacion;
use Carbon\Carbon;

class CalendarioController extends Controller
{
    

    public function index($user_id, $pag) {
        $user = User::findOrFail($user_id);
        if ($user->id == auth()->user()->id) {
            //Get evs and order them
            $cursos = $user->cursos()->where('user_id', $user->id)->get();
            $calendar = Evaluacion::makeCalendar($pag);
            $arrTemp = [];
            $arrEvs = [];
            foreach($cursos as $curso) {
                $evs = $curso->evaluacions()->where('curso_id', $curso->id)->get();
                foreach($evs as $ev) {
                    $arrTemp['curso'] = $curso->nombre;
                    $arrTemp['nombre'] = $ev->nombre;
                    $arrTemp['fecha'] = $ev->fecha;
                    array_push($arrEvs, $arrTemp);
                    $arrTemp = [];
                }
            }
            $colEvs = collect($arrEvs);
            $colEvs = $colEvs->sortBy('fecha');
            $arrEvs = $colEvs->toArray();

            //Merge Calendar and Evs
            $merged = [];
            foreach($calendar as $dia) {
                $diaTemp = [];
                $diaTemp['dia'] = date('d/m/Y', strtotime($dia['dia']));
                $diaTemp['diaSemana'] = $dia['diaSemana'];
                $diaTemp['existe'] = false;
                $diaTemp['evs'] = [];
                foreach($arrEvs as $ev) {
                    $evTemp = [];
                    if($ev['fecha'] == $dia['dia']) {
                        $diaTemp['existe'] = true;
                        unset($ev['fecha']);
                        array_push($diaTemp['evs'], $ev);
                    }
                }
                array_push($merged, $diaTemp);
            }

            //dd($merged);

            return view('calendario', [
                'user' => $user,
                'dias' => $merged,
                'pag' => $pag
            ]);
        }
        else return redirect('/');
    }
}
