<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Adicionar Passo em: {{ $guia->titulo }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('admin.guia-itens.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="guia_id" value="{{ $guia->id }}">

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Título do Passo
                            (Opcional)</label>
                        <input type="text" name="titulo_passo" placeholder="Ex: Passo 1, Configurar Env..."
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:outline-none">
                        <p class="text-xs text-gray-500 mt-1">Usado principalmente no layout "Passo a Passo".</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Conteúdo /
                            Descrição (HTML permitido)</label>
                        <textarea name="conteudo" rows="3"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:outline-none"
                            required></textarea>
                        <p class="text-xs text-gray-500 mt-1">Ex: <code>composer install</code> ou texto explicativo.
                        </p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Bloco de Código
                            (Opcional)</label>
                        <textarea name="codigo" rows="4"
                            class="font-mono shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:outline-none"
                            placeholder="Cole o código aqui se houver..."></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Ordem</label>
                        <input type="number" name="ordem" value="{{ $guia->itens()->count() + 1 }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:outline-none">
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none">Salvar
                            Passo</button>
                        <a href="{{ route('admin.guias.edit', $guia->id) }}"
                            class="text-gray-500 hover:text-gray-700">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
