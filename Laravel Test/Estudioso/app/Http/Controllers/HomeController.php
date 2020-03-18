<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $user = auth()->user();
        $cursos = $user->cursos()->where('user_id', $user->id)->get();
        $evsTot = [];
        foreach($cursos as $curso) {
            $evs = $curso->evaluacions()->where('curso_id', $curso->id)->get();
            foreach($evs as $ev) {
                $to = Carbon::createFromFormat('Y-m-d', $ev->fecha);
                $from = Carbon::createFromFormat('Y-m-d', Carbon::now()->toDateString());
                $diff = $from->diffInDays($to, false);
                if($diff>=0) {
                    array_push($evsTot, $ev);
                }
            }
        }
        
        $evsTot = collect($evsTot);
        $evsTot = $evsTot->sortBy('fecha');
        $evsTot = $evsTot->all();
        $dias=[];
        $listaCursos = [];
        foreach ($evsTot as $ev) {
            foreach($cursos as $curso) {
                if($curso->id == $ev->curso_id) {
                    array_push($listaCursos, $curso);
                }
            }
            $to = Carbon::createFromFormat('Y-m-d', $ev->fecha);
            $from = Carbon::createFromFormat('Y-m-d', Carbon::now()->toDateString());
            $diff = $from->diffInDays($to, false);
            array_push($dias, $diff);
        }

        //dd($evsTot);

        return view('home', [
            'evs' => $evsTot,
            'cursos' => $listaCursos,
            'dias' => $dias
        ]);
    }
}
