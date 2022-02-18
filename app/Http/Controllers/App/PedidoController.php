<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Site\Cliente;
use App\Models\Site\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pedidos = Pedido::paginate(5);
        return view('app.pedido.index', ['title' => 'Pedido', 'pedidos' => $pedidos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('app.pedido.create', ['title' => 'Pedido', 'clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['cliente_id' => 'exists:clientes,id'], ['cliente_id.exists' => 'O Campo deve existir na tabela de Clientes!']);
        Pedido::create($request->all());
        return redirect()->route('app.pedido.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        $clientes = Cliente::all();
        return view('app.pedido.create', ['title' => 'Pedido', 'clientes' => $clientes, 'pedido' => $pedido]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Site\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        $request->validate(['cliente_id' => 'exists:clientes,id'], ['cliente_id.exists' => 'O Campo deve existir na tabela de Clientes!']);
        $pedido->update($request->all());
        return redirect()->route('app.pedido.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
