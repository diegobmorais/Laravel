<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $query = Client::query();

        // Filtragem por nome
        if ($request->has('nome')) {
            $query->where('nome', 'like', '%' . $request->input('nome') . '%');
        }

        // Filtragem por CPF
        if ($request->has('cpf')) {
            $query->where('cpf', 'like', '%' . $request->input('cpf') . '%');
        }

        // Filtragem por data de nascimento
        if ($request->has('date_birth')) {
            $query->where('date_birth', $request->input('date_birth'));
        }

        // Retornar a lista de clientes
        $clients = $query->get();

        return response()->json(['clients' => $clients], 200);
    }
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

    public function update(Request $request, $id)
    {
        // Validação dos dados
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'cpf' => 'required|string|max:14',
            'date_birth' => 'required|date',
            'address' => 'required|string|max:255',
        ]);

        // Se a validação falhar, retorne os erros
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Atualização do cliente
        $client = Client::find($id);

        if (!$client) {
            return response()->json(['message' => 'Cliente não encontrado.'], 404);
        }

        $client->update([
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'cpf' => $request->input('cpf'),
            'date_birth' => $request->input('date_birth'),
            'address' => $request->input('address'),
        ]);

        // Retorno do cliente atualizado
        return response()->json(['client' => $client], 200);
    }
}
