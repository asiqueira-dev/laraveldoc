<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar Comando
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('admin.comandos.update', $comando) }}" method="POST">
                    @csrf
                    @method('PUT') <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Tema
                            (Categoria)</label>
                        <select name="tema_id"
                            class="shadow border rounded w-full py-2 px-3 text-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:outline-none">
                            @foreach ($temas as $tema)
                                <option value="{{ $tema->id }}"
                                    {{ $comando->tema_id == $tema->id ? 'selected' : '' }}>
                                    {{ $tema->titulo }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Título / Descrição
                            Curta</label>
                        <input type="text" name="titulo" value="{{ $comando->titulo }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:outline-none"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Código do
                            Comando</label>
                        <textarea name="codigo" rows="2"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:bg-gray-900 dark:text-gray-300 font-mono focus:outline-none"
                            required>{{ $comando->codigo }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Ordem</label>
                        <input type="number" name="ordem" value="{{ $comando->ordem }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:outline-none">
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none">
                            Salvar Alterações
                        </button>
                        <a href="{{ route('admin.comandos.index') }}"
                            class="text-gray-500 hover:text-gray-700">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
