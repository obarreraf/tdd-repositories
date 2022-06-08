<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Repositorios 

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p class="text-right mb-4">
                <a href="{{ route('repositories.create') }}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-md text-xs">
                    Agregar un nuevo repositorio
                </a>
            </p>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Enlace</th>
                            <th colspan="3">&nbsp</th>
                        </tr>
                    <thead>
                    <tbody>
                        @forelse ($repositories as $repository)
                        <tr>
                            <td class="border px-4 py-2">{{ $repository->id}}</td>
                            <td class="border px-4 py-2">{{ $repository->url}}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('repositories.show', $repository) }}" class="bg-gray-200 text-white font-bold py-2 px-4 rounded-md text-xs">Ver</a>
                            </td>
                            <td class="px-4 py-2">
                                <a href="{{ route('repositories.edit', $repository) }}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-md text-xs">Editar</a>
                            </td>
                            <td class="px-4 py-2">
                                <form action="{{ route('repositories.destroy', $repository) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <input type="submit" value="Eliminar" class="bg-red-600 text-white font-bold py-2 px-4 rounded-md text-xs" >
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">No hay repositorios creados</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
