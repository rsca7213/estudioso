<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Curso;
use \App\Evaluacion;

class CursosController extends Controller
{
    public function __construct () {
        $this->middleware('auth');
    }

    public function create ($id) {

        if ($id == auth()->user()->id) {
            return view('cursos.agregar',[
                'userid' => $id,
            ]);
        }
        else return view('home');
    }

    public function store (Request $request, $id) {
        if ($id == auth()->user()->id) {
            $data = $request->validate([
                'nombre' => 'required|unique:cursos|string',
            ]);
            $curso_id = auth()->user()->cursos()->insertGetId([
                'user_id' => $id,
                'nombre' => $data['nombre'],
            ]);
            return redirect('/cursos/agregar/'.$id.'/'.$curso_id.'/evaluaciones');
        }
        else return view('home');
    }

    public function index ($user_id) {
        if($user_id == auth()->user()->id) {
            $user = User::findOrFail($user_id);
            $cursos = $user->cursos()->where('user_id', $user_id)->get();
            return view('cursos.ver', [
                'user_id' => $user_id,
                'cursos' => $cursos,
            ]);
        }
        else return redirect('/');
    }

    public function destroy (Request $request, $user_id, $curso_id) {
        if($user_id == auth()->user()->id) {
            $curso = Curso::findOrFail($curso_id);
            $user = User::findOrFail($user_id);
            if($curso->user_id == $user_id) {
                $evs = $curso->evaluacions()->where('curso_id', $curso_id)->get();
                foreach($evs as $ev) {
                    Evaluacion::destroy($ev->id);
                }
                Curso::destroy($curso->id);
                return view('cursos.ver', [
                    'user_id' => $user_id,
                    'cursos' => $user->cursos()->where('user_id', $user_id)->get(),
                ]);
            }
        }
        return redirect('/');
    }
}
