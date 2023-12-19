<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ContaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {   
        return view('contas.index', [
            'contas' => Conta::where('user_id', '=', Auth::id())->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('contas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:40',
            'banco' => 'required|string|max:40',
            'tipo' => 'required|string|max:40',
            'saldo' => 'decimal:2|min:0|nullable',
            'vencimento' => 'integer|min:0|nullable'
        ]);

        $request->user()->contas()->create($validated);

        return redirect(route('contas.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Conta $conta): View
    {
        return view('contas.show', ['conta' => $conta]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conta $conta): View
    {
        $this->authorize('update', $conta);

        return view('contas.edit', ['conta' => $conta]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Conta $conta): RedirectResponse
    {
        $this->authorize('update', $conta);

        $validated = $request->validate([
            'nome' => 'required|string|max:40',
            'banco' => 'required|string|max:40',
            'tipo' => 'required|string|max:40',
            'saldo' => 'decimal:2|min:0',
            'vencimento' => 'integer|min:0'
        ]);

        $conta->update($validated);

        return redirect(route('contas.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conta $conta): RedirectResponse
    {
        $this->authorize('delete', $conta);

        $conta->delete();

        return redirect(route('contas.index'));
    }
}
