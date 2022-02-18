<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Site\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes = Cliente::paginate(5);
        // dd($clientes);
        return view('app.cliente.index', ['title' => 'Cliente', 'clientes' => $clientes, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.cliente.create', ['title' => 'Cliente']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            ['nome' => 'required|min:3|max:200'],
            [
                'nome.required' => 'O campo nome é obrigatório',
                'nome.min' => 'O campo deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo deve ter no máximo 200 caracteres'
            ]
        );

        $cliente = new Cliente();
        $cliente->nome = $request->get('nome');
        $cliente->save();
        return redirect()->route('app.cliente.index', ['title' => 'Produto']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('app.cliente.create', ['title' => 'Cliente', 'cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Site\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate(
            ['nome' => 'required|min:3|max:200'],
            [
                'nome.required' => 'O campo nome é obrigatório',
                'nome.min' => 'O campo deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo deve ter no máximo 200 caracteres'
            ]
        );

        $cliente->update($request->all());

        return redirect()->route('app.cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('app.cliente.index');
    }
}
