<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        try {
            $pets = Pet::all();
            return $pets;
        } catch (\Throwable $th) {
            return;
        }
    }
    public function store(Request $request) //captura o body da requisição
    {
        //var_dump($request->all());
        $data = $request->all();
        $pet =  Pet::create($data);

        return $pet;
    }
}
