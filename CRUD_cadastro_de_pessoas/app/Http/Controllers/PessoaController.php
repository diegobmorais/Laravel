<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function index()
    {
        try {
            $pessoas = Pessoa::all();

            return response()->json([
                'success' => true,
                'data' => $pessoas,
                'message' => count($pessoas) . ' pessoas encontradas.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor.'
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            // Validação dos dados recebidos
            $request->validate([
                'name' => 'required|max:150',
                'cpf' => 'max:20',
                'contact' => 'max:20',
            ]);

            // Cria uma nova pessoa
            $pessoa = Pessoa::create([
                'name' => $request->input('name'),
                'cpf' => $request->input('cpf'),
                'contact' => $request->input('contact'),
            ]);

            return response()->json([
                'success' => true,
                'data' => $pessoa,
                'message' => 'Pessoa cadastrada com sucesso.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor().'
            ], 500);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            // Validação dos dados recebidos
            $request->validate([
                'name' => 'required|max:150',
                'cpf' => 'max:20',
                'contact' => 'max:20',
            ]);

            // Busca a pessoa pelo ID
            $pessoa = Pessoa::find($id);

            // Se a pessoa não existir, retorna um erro
            if (!$pessoa) {
                return response()->json([
                    'success' => false,
                    'message' => 'Pessoa não encontrada.'
                ], 404);
            }

            // Atualiza os dados da pessoa
            $pessoa->update([
                'name' => $request->input('name'),
                'cpf' => $request->input('cpf'),
                'contact' => $request->input('contact'),
            ]);

            return response()->json([
                'success' => true,
                'data' => $pessoa,
                'message' => 'Pessoa atualizada com sucesso.'
            ], 200);
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
            // Busca a pessoa pelo ID
            $pessoa = Pessoa::find($id);

            // Se a pessoa não existir, retorna um erro
            if (!$pessoa) {
                return response()->json([
                    'success' => false,
                    'message' => 'Pessoa não encontrada.'
                ], 404);
            }

            // Remove a pessoa do banco de dados
            $pessoa->delete();

            return response()->json([
                'success' => true,
                'data' => $pessoa,
                'message' => 'Pessoa deletada com sucesso.'
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
        try {
            // Busca a pessoa pelo ID
            $pessoa = Pessoa::find($id);

            // Se a pessoa não existir, retorna um erro
            if (!$pessoa) {
                return response()->json([
                    'success' => false,
                    'data' => null,
                    'message' => 'Pessoa não encontrada no banco de dados.'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $pessoa,
                'message' => 'Pessoa encontrada com sucesso.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'data' => null,
                'message' => 'Erro interno do servidor.'
            ], 500);
        }
    }
}
