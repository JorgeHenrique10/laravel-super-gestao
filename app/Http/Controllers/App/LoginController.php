<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request, $error = null)
    {
        if ($error != '') {

            if ($error == 1) {

                $error = 'Usuário ou Senha inválida!';
            } elseif ($error == 2) {
                $error = 'Favor efetuar o login!';
            }
        }
        return view('app.login', ['title' => 'Login', 'erro' => $error]);
    }

    public function loginIn(Request $request)
    {
        $validacoes = [
            'login' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'login.email' => 'Favor inserir um email válido!',
            'senha.required' => 'Favor inserir a senha!'
        ];

        $request->validate($validacoes, $feedback);

        $email = $request->get('login');
        $senha = $request->get('senha');

        $user = new User();
        $usuario = $user->where('email', $email)->where('password', $senha)->get()->first();

        if ($usuario) {
            // session_start();
            session(['nome' => $usuario->name]);
            session(['email' => $usuario->email]);

            return redirect()->route('app.home');
        } else {
            return redirect()->route('app.login', ['error' => 1]);
        }
    }
    public function home()
    {
        return view('app.home', ['title' => 'Home']);
    }

    public function sair()
    {
        session()->flush();
        return view('site.principal');
    }
}
