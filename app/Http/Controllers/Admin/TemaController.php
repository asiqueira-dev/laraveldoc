<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tema;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TemaController extends Controller
{
    public function index()
    {
        $temas = Tema::orderBy('ordem')->get();
        return view('admin.temas.index', compact('temas'));
    }

    public function create()
    {
        return view('admin.temas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'icone'  => 'required|string|max:50', // ex: bi-box
            'ordem'  => 'integer'
        ]);

        $validated['slug'] = Str::slug($validated['titulo']);

        Tema::create($validated);
        return redirect()->route('admin.temas.index')->with('success', 'Tema criado com sucesso!');
    }

    public function edit(Tema $tema)
    {
        return view('admin.temas.edit', compact('tema'));
    }

    public function update(Request $request, Tema $tema)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'icone'  => 'required|string|max:50',
            'ordem'  => 'integer'
        ]);

        $validated['slug'] = Str::slug($validated['titulo']);
        
        $tema->update($validated);
        return redirect()->route('admin.temas.index')->with('success', 'Tema atualizado!');
    }

    public function destroy(Tema $tema)
    {
        $tema->delete();
        return redirect()->route('admin.temas.index')->with('success', 'Tema excluído!');
    }
}