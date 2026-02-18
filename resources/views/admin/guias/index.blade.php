<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Guias Rápidos</h2>
            <a href="{{ route('admin.guias.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Novo Guia</a>
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
                                Título</th>
                            <th
                                class="px-5 py-3 border-b-2 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase">
                                Layout</th>
                            <th
                                class="px-5 py-3 border-b-2 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase">
                                Passos</th>
                            <th class="px-5 py-3 border-b-2 bg-gray-100">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guias as $guia)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-gray-800 text-sm">
                                    <div class="flex items-center gap-2">
                                        <i class="bi {{ $guia->icone }} text-lg"></i>
                                        <div>
                                            <div class="font-bold">{{ $guia->titulo }}</div>
                                            <div class="text-xs text-gray-500">{{ $guia->subtitulo }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-gray-800 text-sm">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $guia->layout == 'lista_simples' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                        {{ $guia->layout == 'lista_simples' ? 'Lista' : 'Passo a Passo' }}
                                    </span>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-gray-800 text-sm">
                                    {{ $guia->itens_count }} itens
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-gray-800 text-sm">
                                    <a href="{{ route('admin.guias.edit', $guia) }}"
                                        class="text-blue-600 hover:text-blue-900 mr-4">Gerenciar</a>
                                    <form action="{{ route('admin.guias.destroy', $guia) }}" method="POST"
                                        class="inline-block"
                                        onsubmit="return confirm('Isso apagará o guia e todos os passos. Continuar?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
