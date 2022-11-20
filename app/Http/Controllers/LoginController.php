<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request) {
        $erro = '';
        if($request->get('erro')== 1){
            $erro = 'Usuario ou Senha não Existe';
        }

        if($request->get('erro')== 2){
            $erro = 'Necessário realizar login para ter acesso a página';
        }
        return view('site.login', ['titulo' => 'Login','erro' => $erro]);
    }

    public function autenticar(Request $request) {
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);
        // recupera dados do formulario
        $email = $request->get('usuario');
        $password = $request->get('senha');

        // echo 'Usuario:'.$email.'| senha:'.$password;
        // echo '<br>';
        // print_r($request->all());

        // iniciar o model user
        $user = new user();

        $usuario = $user->where('email', $email)->where('password', $password )->get()->first();
        if(isset($usuario->name)){
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            // dd($usuario);
            return \redirect()->route('app.clientes');
        }else{
            return \redirect()->route('site.login', ['erro' => 1]);
        }
        // echo '<pre>';
        // print_r($usuario);
    }
}
