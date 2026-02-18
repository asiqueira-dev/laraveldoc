<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comando;
use App\Models\Tema;
use Illuminate\Http\Request;

class ComandoController extends Controller
{
    public function index()
    {
        // Eager loading do tema para evitar N+1 queries
        $comandos = Comando::with('tema')->orderBy('tema_id')->orderBy('ordem')->paginate(20);
        return view('admin.comandos.index', compact('comandos'));
    }

    public function create()
    {
        $temas = Tema::orderBy('titulo')->get();
        return view('admin.comandos.create', compact('temas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tema_id'   => 'required|exists:temas,id',
            'titulo'    => 'required|string|max:255', // Descrição curta
            'codigo'    => 'required|string',         // O comando
            'ordem'     => 'integer|nullable'
        ]);

        Comando::create($validated);
        return redirect()->route('admin.comandos.index')->with('success', 'Comando adicionado!');
    }

    public function edit(Comando $comando)
    {
        $temas = Tema::orderBy('titulo')->get();
        return view('admin.comandos.edit', compact('comando', 'temas'));
    }

    public function update(Request $request, Comando $comando)
    {
        $validated = $request->validate([
            'tema_id'   => 'required|exists:temas,id',
            'titulo'    => 'required|string|max:255',
            'codigo'    => 'required|string',
            'ordem'     => 'integer|nullable'
        ]);

        $comando->update($validated);
        return redirect()->route('admin.comandos.index')->with('success', 'Comando atualizado!');
    }

    public function destroy(Comando $comando)
    {
        $comando->delete();
        return redirect()->route('admin.comandos.index')->with('success', 'Comando removido!');
    }
}