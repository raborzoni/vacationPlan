<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;

class ParticipantController extends Controller
{
    // Criar um novo participante
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'holiday_plan_id' => 'required|exists:holiday_plans,id'
        ]);

        $participant = Participant::create($request->all());

        return response()->json($participant, 201);
    }

    // Listar todos os participantes
    public function index()
    {
        $participants = Participant::all();
        return response()->json($participants);
    }

    // Mostrar um participante específico
    public function show($id)
    {
        $participant = Participant::findOrFail($id);
        return response()->json($participant);
    }

    // Atualizar um participante específico
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'holiday_plan_id' => 'required|exists:holiday_plans,id'
        ]);

        $participant = Participant::findOrFail($id);
        $participant->update($request->all());

        return response()->json($participant);
    }

    // Excluir um participante específico
    public function destroy($id)
    {
        $participant = Participant::findOrFail($id);
        $participant->delete();

        return response()->json(null, 204);
    }
}
