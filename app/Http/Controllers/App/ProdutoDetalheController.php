<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Site\Produto;
use App\Models\Site\ProdutoDetalhe;
use App\Models\Site\Unidade;
use Illuminate\Http\Request;

class ProdutoDetalheController extends Controller
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
    public function create()
    {
        $produtos = Produto::with(['produtoDetalhe'])->get();
        $unidades = Unidade::all();
        return view('app.produtoDetalhe.create', ['title' => 'produtoDetalhe', 'produtos' => $produtos, 'unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProdutoDetalhe::create($request->all());
        print_r('ProdutoDetalhe Cadastrado com sucesso!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site\ProdutoDetalhe  $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function show(ProdutoDetalhe $produtoDetalhe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site\ProdutoDetalhe  $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdutoDetalhe $produtoDetalhe)
    {
        $produtos = Produto::with(['produtoDetalhe'])->get();
        $unidades = Unidade::all();

        return view('app.produtoDetalhe.create', [
            'title' => 'Produto Detalhe',
            'produtos' => $produtos,
            'unidades' => $unidades,
            'produtoDetalhe' => $produtoDetalhe
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Site\ProdutoDetalhe  $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutoDetalhe $produtoDetalhe)
    {
        $produtoDetalhe->update($request->all());
        print_r('produto detalhe atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site\ProdutoDetalhe  $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdutoDetalhe $produtoDetalhe)
    {
        //
    }
}
