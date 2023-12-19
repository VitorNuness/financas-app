<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <x-primary-button class="mt-4"><a href="{{ route('contas.create') }}">Criar conta</a></x-primary-button>
        <table class="table-auto border-collapsed border border-gray-900 mt-6">
            <thead class="border border-gray-900 bg-gray-800 text-white">
                <th class="py-auto">
                <td>Nome</td>
                <td>Banco</td>
                <td>Tipo</td>
                <td>Saldo</td>
                <td>Dia de Vencimento</td>
                <td>Ações</td>
                </th>
            </thead>
            <tbody>
                @forelse ($contas as $conta)
                    <th>
                    <td class="pr-5">{{ $conta->nome }}</td>
                    <td class="pr-5">{{ $conta->banco }}</td>
                    <td class="pr-5">{{ $conta->tipo }}</td>
                    <td class="pr-5">{{ $conta->saldo }}</td>
                    <td class="pr-5">{{ $conta->vencimento }}</td>
                    <td>
                        <form action="{{ route('contas.destroy', $conta) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('contas.show', $conta) }}" class="btn">Ver</a>
                            <a href="{{ route('contas.edit', $conta) }}" class="btn">Editar</a>
                            <button type="submit">Deletar</button>
                        </form>
                    </td>
                    </th>
                @empty
                    <th>
                    <td colspan="5">Nenhuma conta encontrada!</td>
                    </th>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
