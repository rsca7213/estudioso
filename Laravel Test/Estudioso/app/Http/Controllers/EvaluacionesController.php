<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;

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

            return view('cursos.evaluaciones.agregar', [
                'user_id' => $user_id,
                'curso' => $curso
            ]);
        }
        else return redirect('/');
    }
}
