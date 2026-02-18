<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guia;
use Illuminate\Http\Request;

class GuiaController extends Controller
{
    /**
     * Lista todos os guias cadastrados (Ex: Início Rápido, Helper).
     */
    public function index()
    {
        // Carrega os guias ordenados pela coluna 'ordem'
        // withCount('itens') nos permite mostrar quantos passos cada guia tem na listagem
        $guias = Guia::withCount('itens')->orderBy('ordem', 'asc')->get();
        
        return view('admin.guias.index', compact('guias'));
    }

    /**
     * Mostra o formulário para criar um novo guia.
     */
    public function create()
    {
        return view('admin.guias.create');
    }

    /**
     * Salva o novo guia no banco de dados.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'nullable|string|max:255',
            'icone' => 'nullable|string|max:50', // Ex: bi-rocket
            'classe_cor' => 'nullable|string|max:50', // Ex: bg-red-soft
            'layout' => 'required|in:lista_simples,passo_a_passo', // Valida o enum
            'ordem' => 'integer|nullable',
        ]);

        // Define valores padrão se não forem enviados
        $validated['ordem'] = $validated['ordem'] ?? 0;
        $validated['classe_cor'] = $validated['classe_cor'] ?? 'bg-blue-soft';
        $validated['icone'] = $validated['icone'] ?? 'bi-star';

        Guia::create($validated);

        return redirect()->route('admin.guias.index')
                         ->with('success', 'Guia criado com sucesso! Agora adicione os passos.');
    }

    /**
     * Mostra o formulário de edição.
     * Carrega também os 'itens' (passos) para serem listados na view de edição.
     */
    public function edit(Guia $guia)
    {
        // Carrega os itens ordenados para exibir na tela de edição
        $guia->load(['itens' => function($query) {
            $query->orderBy('ordem', 'asc');
        }]);

        return view('admin.guias.edit', compact('guia'));
    }

    /**
     * Atualiza os dados do Guia.
     */
    public function update(Request $request, Guia $guia)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'nullable|string|max:255',
            'icone' => 'nullable|string|max:50',
            'classe_cor' => 'nullable|string|max:50',
            'layout' => 'required|in:lista_simples,passo_a_passo',
            'ordem' => 'integer|nullable',
        ]);

        $guia->update($validated);

        return redirect()->route('admin.guias.index')
                         ->with('success', 'Guia atualizado com sucesso!');
    }

    /**
     * Remove o guia e todos os seus itens (cascade delete configurado na migration).
     */
    public function destroy(Guia $guia)
    {
        $guia->delete();

        return redirect()->route('admin.guias.index')
                         ->with('success', 'Guia e seus passos foram excluídos!');
    }
}