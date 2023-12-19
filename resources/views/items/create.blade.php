<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ops!</strong> Temos alguns problemas:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form method="POST" action="{{ route('items.store') }}">
            @csrf
            <div>
                <div>
                    <label for="nome">Nome:</label>
                </div>
                <input type="text" name="nome" placeholder="Nome Exemplo"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('nome') }}">
            </div>
            <div>
                <div>
                    <label for="conta">Conta:</label>
                </div>
                @if (count($contas) > 0)
                <select name="conta" id="conta"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="" name="conta" selected>Selecione uma conta</option>
                    @foreach ($contas as $conta)
                        <option value="{{ $conta->id }}">{{ $conta->nome }}</option>
                    @endforeach
                </select>
                @else
                    <x-primary-button><a href="{{ route('contas.create') }}">Adicionar Conta</a></x-primary-button>
                @endif
            </div>
            <div class="mt-4 mb-4">
                <div>
                    <label for="tipo">Tipo:</label>
                </div>
                <input type="radio" name="tipo" value="entrada" {{ old('tipo') == 'entrada' ? "checked" : "" }}>Entrada
                <input type="radio" name="tipo" value="saida" checked>Saída
            </div>
            <div>
                <div>
                    <label for="valor">Valor:</label>
                </div>
                <input type="number" name="valor" placeholder="Ex.: 0,00"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('valor') }}">
            </div>
            <div>
                <div>
                    <label for="vencimento">Vencimento:</label>
                </div>
                <input type="date" name="vencimento"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('vencimento') }}">
            </div>
            <x-primary-button class="mt-4">{{ __('Salvar') }}</x-primary-button>
            <a href="{{ route('items.index') }}">Cancelar</a>
        </form>
    </div>
</x-app-layout>
