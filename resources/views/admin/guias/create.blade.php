<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Novo Guia</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('admin.guias.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Título</label>
                            <input type="text" name="titulo"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:outline-none"
                                required>
                        </div>
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Subtítulo
                                (Opcional)</label>
                            <input type="text" name="subtitulo"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:outline-none">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Ícone
                                (Bootstrap)</label>
                            <input type="text" name="icone" placeholder="ex: bi-rocket"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Cor de Fundo
                                (Classe CSS)</label>
                            <input type="text" name="classe_cor" placeholder="ex: bg-red-soft"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Layout</label>
                            <select name="layout"
                                class="shadow border rounded w-full py-2 px-3 text-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:outline-none">
                                <option value="lista_simples">Lista Simples (Início Rápido)</option>
                                <option value="passo_a_passo">Passo a Passo com Código (Helpers)</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Ordem</label>
                        <input type="number" name="ordem" value="0"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:outline-none">
                    </div>

                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none">Salvar
                        e Adicionar Passos</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
