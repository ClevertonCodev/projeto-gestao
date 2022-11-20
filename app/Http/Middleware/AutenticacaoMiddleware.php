<?php

namespace App\Http\Middleware;

use Closure;
use Facade\FlareClient\Http\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_autenticacao, $perfil){

        session_start();
        if(isset($_SESSION['email']) && $_SESSION['email'] != ''){
            return $next($request);
        }else{
            return \redirect()->route('site.login', ['erro' => 2]);
        }
    }


}

    // // public function handle($request, Closure $next )
    // {

    //     //     echo $metodo_autenticacao.'-'.$perfil.'<br>';
    //     //     if($metodo_autenticacao == 'padrao'){
    //     //         echo 'verificar o usuario no banco de dados'.$perfil.'<br>';
    //     //     }
    //     //     if($metodo_autenticacao == 'ldap'){
    //     //         echo 'verificar o usuario e senha do AD'.$perfil.'<br>';
    //     //     }

    //     //     if (false) {
    //     //         return $next($request);
    //     //     } else {
    //     //         return Response('Acesso negado! Rota Exige autenticação!!');
    //     //     }
    //     //     //     return $next($request);
    //     // }
    // }}
