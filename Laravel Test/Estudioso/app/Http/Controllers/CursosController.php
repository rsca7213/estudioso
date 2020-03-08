<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class CursosController extends Controller
{
    public function __construct () {
        $this->middleware('auth');
    }

    public function agregar ($id) {
        return view('cursos.agregar',[
            'userid' => $id,
        ]);
    }
}
