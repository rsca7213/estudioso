<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class PerfilesController extends Controller
{
    public function index ($user_id) {
        $user = User::findOrFail($user_id);
        if ($user->id == auth()->user()->id) {
            return view ('perfil.editar', [
                'user' => $user,
                's' => ''
            ]);
        }
        else return redirect('/');
    }

    public function success ($user_id) {
        $user = User::findOrFail($user_id);
        if ($user->id == auth()->user()->id) {
            return view ('perfil.editar', [
                'user' => $user,
                's' => '¡Cambios realizados con exito!'
            ]);
        }
        else return redirect('/');
    }

    public function update (Request $request, $user_id) {
        $user = User::findOrFail($user_id);
        if($user->id == auth()->user()->id) {
            $data = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id, 'id')],
                'password' => ['required', 'string', 'min:8'],
                'passwordNew' => ['required', 'string', 'min:8']
            ]);
            if(Hash::check($data['password'], $user->password)) {
                $user->update([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['passwordNew']),
                ]);
                $idString = (string)$user->id;
                $arr = array('/perfil',$idString,'s');
                $link = join("/",$arr);
                return redirect($link);
            }
            throw ValidationException::withMessages(['password' => 'La contraseña introducida es incorrecta.']);
        }
        else return redirect('/');
    }
}
