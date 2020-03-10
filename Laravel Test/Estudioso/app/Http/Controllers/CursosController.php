<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Curso;

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
}
