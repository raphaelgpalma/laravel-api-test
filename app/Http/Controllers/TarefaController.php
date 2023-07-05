<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TarefaController extends Controller
{
    
     public function index(){
        $tarefas = Tarefa::all();
        return response()->json($tarefas);
    }

    
    public function show($id){
        $tarefas = Tarefa::findOrFail($id);
        return response()->json($tarefas);
    }

    
    public function store(Request $request){
        $authenticator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|in:true,false',
        ]);

        if ($authenticator->fails()) {
            return response()->json(['errors' => $authenticator->errors()], 422); 
        }

        $tarefas = Tarefa::create($request->all());
        return response()->json($tarefas, 201);
    }

   
    public function update(Request $request, $id){
        $authenticator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|in:true,false',
        ]);

        if ($authenticator->fails()) {
            return response()->json(['errors' => $authenticator->errors()], 422); 
        }

        $tarefas = Tarefa::findOrFail($id);
        $tarefas->update($request->all());
        return response()->json($tarefas);
    }

   
    public function destroy($id){
        $tarefas = Tarefa::findOrFail($id);
        $tarefas->delete();
        return response()->json(null, 204); 
    }
}
