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
        <form method="POST" action="{{ route('contas.store') }}">
            @csrf
            <div>
                <div>
                    <label for="nome">Nome:</label>
                </div>
                <input type="text" name="nome" placeholder="Conta Exemplo"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('nome') }}">
            </div>
            <div>
                <div>
                    <label for="banco">Banco:</label>
                </div>
                <input type="text" name="banco" placeholder="Banco Exemplo"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('banco') }}">
            </div>
            <div>
                <div>
                    <label for="tipo">Tipo:</label>
                </div>
                <select name="tipo" id="tipo"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="" name="tipo" selected>Selecione uma opção</option>
                    <option value="poupanca" name="tipo" {{ old('tipo') == 'poupanca' ? "selected" : "" }}>Poupança</option>
                    <option value="corrente" name="tipo" {{ old('tipo') == 'corrente' ? "selected" : "" }}>Conta Corrente</option>
                    <option value="c_credito" name="tipo" {{ old('tipo') == 'c_credito' ? "selected" : "" }}>Cartão de Crédito</option>
                    <option value="outros" name="tipo" {{ old('tipo') == 'outros' ? "selected" : "" }}>Outros</option>
                </select>
            </div>
            <div>
                <div>
                    <label for="saldo">Saldo (opcional):</label>
                </div>
                <input type="number" name="saldo" placeholder="Ex.: 0,00"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('saldo') }}">
            </div>
            <div>
                <div>
                    <label for="vencimento">Dia do Vencimento (opcional):</label>
                </div>
                <input type="number" name="vencimento" placeholder="Ex.: 25"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('vencimento') }}">
            </div>
            <x-primary-button class="mt-4">{{ __('Salvar') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
