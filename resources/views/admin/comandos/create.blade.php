<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Adicionar Comando</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('admin.comandos.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Tema
                            (Categoria)</label>
                        <select name="tema_id"
                            class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none">
                            @foreach ($temas as $tema)
                                <option value="{{ $tema->id }}">{{ $tema->titulo }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Título / Descrição
                            Curta</label>
                        <input type="text" name="titulo" placeholder="Ex: Inicia servidor local"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Código do
                            Comando</label>
                        <textarea name="codigo" rows="2"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 font-mono focus:outline-none"
                            placeholder="php artisan serve" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Ordem</label>
                        <input type="number" name="ordem" value="0"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none">
                    </div>

                    <button type="submit"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none">Salvar
                        Comando</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
