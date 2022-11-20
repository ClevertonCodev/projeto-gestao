<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MotivoContato;
// use App\Http\Middleware\LogAcessoMiddleware;

class PrincipalController extends Controller
{
    // public function __construct(){
    //     $this->middleware(LogAcessoMiddleware::class);
    // }
    public function principal() {

        $motivo_contatos = MotivoContato::all();

        return view('site.principal', ['motivo_contatos' => $motivo_contatos]);
    }
}
