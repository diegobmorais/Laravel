<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Peoples;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;


class ClienteController extends Controller
{
    public function index()
    {
        try {
            $clients = Clients::all();

            return response()->json([
                'success' => true,
                'data' => $clients,
                'message' => count($clients) . ' clientes encontradas.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor.'
            ], 500);
        }
    }
    public function show($id)
    {
        $clients = Clients::find($id);

        if ($clients) {
            return response()->json(['cliente' => $clients]);
        } else {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'name' => 'string|required|max:255',
                'contact' => 'string|required|max:30',
                'email' => 'string|required|unique:peoples',
                'cpf' => 'string|required|max:30|unique:peoples'
            ]);

            $data = $request->all();
            var_dump($data);

            $people = Peoples::create($data);

            Clients::create([
                'people_id' => $people->id
            ]);


            return $people;
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor.'
            ], 500);
        }
    }
    public function destroy($id)
    {
        try {
            // Localize o cliente
            $client = Clients::where('people_id', $id)->first();

            if (!$client) {
                return response()->json(['message' => 'Cliente não encontrado'], 404);
            }

            // Antes de excluir o cliente,  excluir a pessoa associada a ele
            $people = Peoples::find($id);

            // Remove a associação da tabela Clients
            $client->delete();

            // Agora, exclue a pessoa associada
            if ($people) {
                $people->delete();
            }

            return response()->json([
                'success' => true,
                'message' => 'Cliente excluído com sucesso.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor: ' . $e->getMessage()
            ], 500);
        }
    }
}
