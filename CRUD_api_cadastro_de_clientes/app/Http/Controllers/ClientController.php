<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{

    public function store(Request $request)
    {
        // Validação dos dados
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:clients|max:255',
            'cpf' => 'required|string|unique:clients|max:14',
            'date_birth' => 'required|date',
            'address' => 'required|string|max:255',
        ]);

        // Se a validação falhar, retorne os erros
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Criação do cliente
        $client = Client::create([
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'cpf' => $request->input('cpf'),
            'date_birth' => $request->input('date_birth'),
            'address' => $request->input('address'),
        ]);

        // Retorno do cliente criado
        return response()->json(['client' => $client], 201);
    }
}
