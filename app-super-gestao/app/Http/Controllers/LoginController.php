<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = '';

        if ($request->get("erro") == 1) {
            $erro = "Usuário ou senha invalido";
        }
        if ($request->get("erro") == 2) {
            $erro = "Necessário realizar login para acessar a pagina!";
        }

        return view("site.login", ['erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        // regras para validação de email
        $regras = [
            "usuario" => "required|email",
            "senha" => "required",
        ];

        $feedback = [
            "usuario.required" => "Campo usuário (email) é obrigatório",
            "usuario.email" => "Este não é um email válido",
            "senha.required" => "Campo senha é obrigatório",
        ];

        $request->validate($regras, $feedback);

        //recupera os parametros do formulario
        $email = $request->get('usuario');
        $password = $request->get('senha');

        //inicia o model user
        $user = new User();

        $ususario = $user->where('email', $email)->where('password', $password)->first();

        // fluxo para existencia de usuario no bd
        if (isset($ususario->name)) {
            //iniciando a sessão
            session_start();

            $_SESSION['nome'] = $ususario->name;
            $_SESSION['email'] = $ususario->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function logout(Request $request)
    {
        session_destroy();
        return redirect()->route('site.index');
    }
}
