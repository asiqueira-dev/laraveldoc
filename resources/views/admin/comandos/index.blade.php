<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Comandos</h2>
            <a href="{{ route('admin.comandos.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Novo Comando</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase">
                                Tema</th>
                            <th
                                class="px-5 py-3 border-b-2 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase">
                                Título (Descrição)</th>
                            <th
                                class="px-5 py-3 border-b-2 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase">
                                Comando</th>
                            <th class="px-5 py-3 border-b-2 bg-gray-100">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comandos as $cmd)
                            <tr>
                                <td
                                    class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-gray-800 text-sm font-bold">
                                    {{ $cmd->tema->titulo }}</td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-gray-800 text-sm">
                                    {{ $cmd->titulo }}</td>
                                <td
                                    class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-gray-800 text-sm font-mono text-xs">
                                    {{ Str::limit($cmd->codigo, 50) }}</td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-gray-800 text-sm">
                                    <a href="{{ route('admin.comandos.edit', $cmd) }}"
                                        class="text-blue-600 hover:text-blue-900 mr-4">Editar</a>
                                    <form action="{{ route('admin.comandos.destroy', $cmd) }}" method="POST"
                                        class="inline-block" onsubmit="return confirm('Apagar?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $comandos->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
