<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <x-primary-button class="mt-4"><a href="{{ route('items.create') }}">Adicionar Item</a></x-primary-button>
        <table class="table-auto border-collapsed border border-gray-900 mt-6">
            <thead class="border border-gray-900 bg-gray-800 text-white">
                <th class="py-auto">
                <td>Nome</td>
                <td>Conta</td>
                <td>Tipo</td>
                <td>Valor</td>
                <td>Vencimento</td>
                <td>Pago</td>
                <td>Ações</td>
                </th>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <th>
                    <td class="pr-5">{{ $item->nome }}</td>
                    <td class="pr-5">{{ $item->conta->nome }}</td>
                    <td class="pr-5">{{ $item->tipo }}</td>
                    <td class="pr-5">{{ $item->valor }}</td>
                    <td class="pr-5">{{ $item->vencimento }}</td>
                    <td class="pr-5">{{ $item->pago }}</td>
                    <td>
                        <form action="{{ route('items.destroy', $item) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('items.show', $item) }}" class="btn">Ver</a>
                            <a href="{{ route('items.edit', $item) }}" class="btn">Editar</a>
                            <button type="submit">Deletar</button>
                        </form>
                    </td>
                    </th>
                @empty
                    <th>
                    <td colspan="5">Nenhum item encontrado!</td>
                    </th>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
