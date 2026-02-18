<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guia;
use App\Models\GuiaItem;
use Illuminate\Http\Request;

class GuiaItemController extends Controller
{
    // Exibe o formulário de criar passo (Recebe o ID do Guia Pai)
    public function create(Guia $guia)
    {
        return view('admin.guias.itens.create', compact('guia'));
    }

    // Salva o passo no banco
    public function store(Request $request)
    {
        $validated = $request->validate([
            'guia_id' => 'required|exists:guias,id',
            'titulo_passo' => 'nullable|string|max:255',
            'conteudo' => 'required|string',
            'codigo' => 'nullable|string',
            'ordem' => 'integer|nullable'
        ]);

        GuiaItem::create($validated);

        return redirect()->route('admin.guias.edit', $validated['guia_id'])
                         ->with('success', 'Passo adicionado com sucesso!');
    }

    // Exibe formulário de edição do passo
    public function edit(GuiaItem $guiaItem)
    {
        return view('admin.guias.itens.edit', compact('guiaItem'));
    }

    // Atualiza o passo
    public function update(Request $request, GuiaItem $guiaItem)
    {
        $validated = $request->validate([
            'titulo_passo' => 'nullable|string|max:255',
            'conteudo' => 'required|string',
            'codigo' => 'nullable|string',
            'ordem' => 'integer|nullable'
        ]);

        $guiaItem->update($validated);

        return redirect()->route('admin.guias.edit', $guiaItem->guia_id)
                         ->with('success', 'Passo atualizado!');
    }

    // Deleta o passo
    public function destroy(GuiaItem $guiaItem)
    {
        $guiaId = $guiaItem->guia_id;
        $guiaItem->delete();
        
        return redirect()->route('admin.guias.edit', $guiaId)
                         ->with('success', 'Passo removido!');
    }
}