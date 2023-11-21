<?php

namespace App\Http\Controllers;

use App\Models\SiteContato;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {

        return view('site.contato');
    }

    public function save(Request $request){

        $request->validate([
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'required|email',
            'motivo_contato' => 'required',
            'mensagem' => 'required',
        ],
    [
        'nome.required'=> 'Nome é obrigatório',
        'telefone.required'=> 'Telefone é obrigatório',
        'email.required'=> 'Email é obrigatório',
        'email.email'=> 'Este email não é valido',
        'motivo_contato.required'=> 'Preencha o motivo do contato.',
        'mensagem.required'=> 'Deixe-nos uma mensagem.',
    ]);

        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }
}


