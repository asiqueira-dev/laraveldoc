<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar Tema: {{ $tema->titulo }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('admin.temas.update', $tema) }}" method="POST">
                    @csrf
                    @method('PUT') <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Título</label>
                        <input type="text" name="titulo" value="{{ $tema->titulo }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:outline-none"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Classe do Ícone
                            (Bootstrap Icons)</label>
                        <div class="flex gap-2 items-center">
                            <input type="text" name="icone" value="{{ $tema->icone }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:outline-none"
                                required>
                            <div class="text-2xl"><i class="bi {{ $tema->icone }}"></i></div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Ordem de
                            Exibição</label>
                        <input type="number" name="ordem" value="{{ $tema->ordem }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:outline-none">
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none">
                            Salvar Alterações
                        </button>
                        <a href="{{ route('admin.temas.index') }}"
                            class="text-gray-500 hover:text-gray-700">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
