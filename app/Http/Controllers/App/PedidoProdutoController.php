<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Site\Pedido;
use App\Models\Site\PedidoProduto;
use App\Models\Site\Produto;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();
        return view('app.pedido_produto.create', ['title' => 'Pedido', 'pedido' => $pedido, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        $request->validate(
            [
                'produto_id' => 'exists:produtos,id',
                'quantidade' => 'required'
            ],
            [
                'produto_id.exists' => 'O Campo deve existir na tabela de Produtos!',
                'quantidade.required' => 'Favor inserir um valor válido!',
            ]
        );
        // PedidoProduto::create(['pedido_id' => $pedido->id, 'produto_id' => $request->produto_id]);
        // $pedido->produtos()->attach($request->get('produto_id'), ['quantidade' => $request->get('quantidade')]);
        $pedido->produtos()->attach([
            $request->get('produto_id') => ['quantidade' => $request->get('quantidade')]
        ]);

        return redirect()->route('app.pedido_produto.create', ['pedido' => $pedido->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site\PedidoProduto  $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function show(PedidoProduto $pedidoProduto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site\PedidoProduto  $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function edit(PedidoProduto $pedidoProduto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Site\PedidoProduto  $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PedidoProduto $pedidoProduto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site\PedidoProduto  $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido, Produto $produto, PedidoProduto $pedido_produto)
    {
        // PedidoProduto::where('pedido_id', $pedido->id)->where('produto_id', $produto->id)->delete();
        // $pedido->produtos()->detach($produto->id);
        $pp = PedidoProduto::find($pedido_produto->id);

        if ($pp) {
            $pp->delete();
        }

        return redirect()->route('app.pedido_produto.create', ['title' => 'Produto', 'pedido' => $pedido->id]);
    }
}
