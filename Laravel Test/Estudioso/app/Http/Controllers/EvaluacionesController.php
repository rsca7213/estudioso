<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Evaluacion;
use App\User;

class EvaluacionesController extends Controller
{
    public function create ($id, $curso_id) {
        $auth = auth()->user();
        $curso = Curso::FindOrFail($curso_id);
        if($auth->id == $id && $curso->user_id == $id) {
            return view('cursos.evaluaciones.agregar', ['curso' => $curso, 'user_id' => $id]);
        }
        else return view('home');
    }

    public function store (Request $request, $user_id, $curso_id) {
        $auth = auth()->user();
        $curso = Curso::FindOrFail($curso_id);
        if($auth->id == $user_id && $curso->user_id == $user_id) {

            $data = $request->validate([
                'nombreEv' => 'required|string',
                'fechaEv' => 'required|date',
                'porcEv' => 'numeric|min:1|max:99',
            ]);

            $porcentajeTotal = $data['porcEv'];
            $evalActuales = $curso->evaluacions()->where('curso_id', $curso->id)->get();
            foreach($evalActuales as $porc) {
                $porcentajeTotal += $porc->porcentaje;
            }

            if($porcentajeTotal <= 100) {
                $curso->evaluacions()->create([
                    'curso_id' => $curso->id,
                    'nombre' => $data['nombreEv'],
                    'fecha' => $data['fechaEv'],
                    'porcentaje' => $data['porcEv'],
                ]);
            }

            /*return view('cursos.evaluaciones.agregar', [
                'user_id' => $user_id,
                'curso' => $curso
            ]);*/
            return redirect('/cursos/agregar/'.$user_id.'/'.$curso_id.'/evaluaciones');
        }
        else return redirect('/');
    }

    public function destroy (Request $request, $user_id, $curso_id, $ev_id) {
        $auth = auth()->user();
        $curso = Curso::FindOrFail($curso_id);
        if($auth->id == $user_id && $curso->user_id == $user_id) {
            $ev = Evaluacion::FindOrFail($ev_id);
            if($ev->curso_id == $curso->id) {
                Evaluacion::destroy($ev->id);
                /*return view('cursos.evaluaciones.agregar', [
                    'user_id' => $user_id,
                    'curso' => $curso
                ]);*/
                return redirect('/cursos/agregar/'.$user_id.'/'.$curso_id.'/evaluaciones');
            }
        }
        return redirect('/');
    }

    public function update (Request $request, $user_id, $curso_id, $ev_id) {
        $auth = auth()->user();
        $curso = Curso::FindOrFail($curso_id);
        if($auth->id == $user_id && $curso->user_id == $user_id) {
            $ev = Evaluacion::FindOrFail($ev_id);
            if($ev->curso_id == $curso->id) {
                $data = $request->validate([
                    'nombreEv' => 'required|string',
                    'fechaEv' => 'required|date',
                    'porcEv' => 'numeric|min:1|max:99',
                ]);

                $porcentajeTotal = $data['porcEv'];
                $evalActuales = $curso->evaluacions()->where('curso_id', $curso->id)->get();
                foreach($evalActuales as $porc) {
                    $porcentajeTotal += $porc->porcentaje;
                }
                $porcentajeTotal -= $ev->porcentaje;
                if($porcentajeTotal <= 100) {
                    $ev->update([
                        'porcentaje' => $data['porcEv'],
                        'nombre' => $data['nombreEv'],
                        'fecha' => $data['fechaEv'],
                    ]);
                }

                return redirect('/cursos/agregar/'.$user_id.'/'.$curso_id.'/evaluaciones');
            }
        }
    }

    public function index ($user_id, $curso_id) {
        $user = User::findOrFail($user_id);
        $curso = Curso::findOrFail($curso_id);
        if ($user_id == auth()->user()->id) {
            if ($curso->user_id == auth()->user()->id) {
                $evs = $curso->evaluacions()->where('curso_id', $curso->id)->get();
                return view('cursos.evaluaciones.ver', [
                    'user' => $user,
                    'curso' => $curso,
                    'evs' => $evs
                ]);
            } 
            else return redirect('/');
        }
        else return redirect('/');
    }

    public function calificacion (Request $request, $user_id, $curso_id, $ev_id) {
        $user = User::findOrFail($user_id);
        $curso = Curso::findOrFail($curso_id);
        $ev = Evaluacion::findOrFail($ev_id);
        if($user == auth()->user() && $curso->user_id == $user->id && $ev->curso_id == $curso->id) {
            $data = $request->validate([
                'califEv' => 'numeric|min:0|max:20',
            ]);
            $ev->update([
                'calificacion' => $data['califEv'],
            ]);
            $evs = $curso->evaluacions()->where('curso_id', $curso->id)->get();
            return view('cursos.evaluaciones.ver', [
                'user' => $user,
                'curso' => $curso,
                'evs' => $evs
            ]);
        }
        else return redirect('/');
    }

    public function info ($user_id, $curso_id) {
        $user = User::findOrFail($user_id);
        $curso = Curso::findOrFail($curso_id);
        if(auth()->user() == $user && $curso->user_id == $user->id) {
            $evs = $curso->evaluacions()->where('curso_id', $curso->id)->get();
            $data = [];
            $TotSE = 100;
            $TotEv = 0;
            $TotOb = 0;
            $TotPe = 0;
            foreach($evs as $ev) {
                if($ev->calificacion != null) {
                    $TotEv += $ev->porcentaje;
                    $TotSE -= $ev->porcentaje;
                    $TotOb += (($ev->calificacion * $ev->porcentaje)/20);
                    $TotPe += ($ev->porcentaje - (($ev->calificacion * $ev->porcentaje)/20));
                } 
            }
            $data['TotEv'] = $TotEv;
            $data['TotSE'] = $TotSE;
            $data['TotOb'] = $TotOb;
            $data['TotPe'] = $TotPe;
            return $data;
        }
        else return redirect ('/');
    }
}
