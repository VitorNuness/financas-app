<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Ops!</strong> Encontramos alguns problemas ao tentar salvar as alterações:<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('contas.update', $conta) }}">
            @csrf
            @method('PATCH')
            <div>
                <div>
                    <label for="nome">Nome:</label>
                </div>
                <input type="text" name="nome" placeholder="Conta Exemplo"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ $conta->nome }}" readonly>
            </div>
            <div>
                <div>
                    <label for="banco">Banco:</label>
                </div>
                <input type="text" name="banco" placeholder="Banco Exemplo"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ $conta->banco }}" readonly>
            </div>
            <div>
                <div>
                    <label for="tipo">Tipo:</label>
                </div>
                <input type="text" name="tipo" placeholder="Tipo Exemplo"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ $conta->tipo }}" readonly>
            </div>
            <div>
                <div>
                    <label for="saldo">Saldo (opcional):</label>
                </div>
                <input type="number" name="saldo" placeholder="Ex.: 0,00"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ $conta->saldo }}" step="0.01" readonly>
            </div>
            <div>
                <div>
                    <label for="vencimento">Dia do Vencimento (opcional):</label>
                </div>
                <input type="number" name="vencimento" placeholder="Ex.: 25"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ $conta->vencimento }}" readonly>
            </div>
            <x-primary-button class="mt-4"><a href="{{ route('contas.edit', $conta) }}">Editar</a></x-primary-button>
            <a href="{{ route('contas.index') }}">Voltar</a>
        </form>
    </div>
</x-app-layout>
