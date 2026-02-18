<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Editar Guia: {{ $guia->titulo }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4 text-gray-900 dark:text-gray-100">Dados do Guia</h3>
                <form action="{{ route('admin.guias.update', $guia) }}" method="POST">
                    @csrf @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Título</label>
                            <input type="text" name="titulo" value="{{ $guia->titulo }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:outline-none"
                                required>
                        </div>
                        <div>
                            <label
                                class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Subtítulo</label>
                            <input type="text" name="subtitulo" value="{{ $guia->subtitulo }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:outline-none">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Ícone</label>
                            <input type="text" name="icone" value="{{ $guia->icone }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Cor
                                (CSS)</label>
                            <input type="text" name="classe_cor" value="{{ $guia->classe_cor }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Layout</label>
                            <select name="layout"
                                class="shadow border rounded w-full py-2 px-3 text-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:outline-none">
                                <option value="lista_simples" {{ $guia->layout == 'lista_simples' ? 'selected' : '' }}>
                                    Lista Simples</option>
                                <option value="passo_a_passo" {{ $guia->layout == 'passo_a_passo' ? 'selected' : '' }}>
                                    Passo a Passo (Código)</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Ordem</label>
                        <input type="number" name="ordem" value="{{ $guia->ordem }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:outline-none">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">Atualizar
                            Dados</button>
                    </div>
                </form>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">Passos do Guia</h3>
                    <a href="{{ route('admin.guias.itens.create', $guia->id) }}"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded text-sm">
                        + Adicionar Passo
                    </a>
                </div>

                @if ($guia->itens->count() > 0)
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase">
                                    Ordem</th>
                                <th
                                    class="px-5 py-3 border-b-2 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase">
                                    Título / Conteúdo</th>
                                <th
                                    class="px-5 py-3 border-b-2 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase">
                                    Tem Código?</th>
                                <th class="px-5 py-3 border-b-2 bg-gray-50">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guia->itens as $item)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-gray-800 text-sm">
                                        {{ $item->ordem }}</td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-gray-800 text-sm">
                                        @if ($item->titulo_passo)
                                            <div class="font-bold text-xs uppercase">{{ $item->titulo_passo }}</div>
                                        @endif
                                        <div class="text-gray-600 dark:text-gray-400">{!! Str::limit(strip_tags($item->conteudo), 50) !!}</div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-gray-800 text-sm">
                                        @if ($item->codigo)
                                            <span class="text-green-600 font-bold">Sim</span>
                                        @else
                                            <span class="text-gray-400">Não</span>
                                        @endif
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-gray-800 text-sm">
                                        <a href="{{ route('admin.guia-itens.edit', $item) }}"
                                            class="text-blue-600 hover:text-blue-900 mr-3">Editar</a>
                                        <form action="{{ route('admin.guia-itens.destroy', $item) }}" method="POST"
                                            class="inline-block" onsubmit="return confirm('Excluir este passo?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">X</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-500 text-center py-4">Nenhum passo cadastrado neste guia.</p>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
