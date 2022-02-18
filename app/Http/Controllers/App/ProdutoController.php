<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Site\Fornecedor;
use App\Models\Site\Produto;
use App\Models\Site\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Produto::with(['produtoDetalhe', 'fornecedor'])->paginate(5);
        return view('app.produto.index', ['title' => 'Produto', 'produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fornecedores = Fornecedor::all();
        $unidades = Unidade::all();
        return view('app.produto.create', ['title' => 'Produto', 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validacoes = [
            'nome' => 'required|min:3|max:200',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'required|exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id',
        ];
        $feedback = [
            'required' => 'O campo :attribute é obrigatório!',
            'nome.min' => 'O campo nome deve conter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve conter no máximo 200 caracteres',
            'descricao.min' => 'O campo descricao deve conter no mínimo 3 caracteres',
            'descricao.max' => 'O campo descricao deve conter no máximo 2000 caracteres',
            'peso.integer' => 'O campo tem que ser numérico e do tipo inteiro',
            'unidade_id' => 'O campo deve existir na tabela de unidades',
            'fornecedor_id' => 'O campo deve existir na tabela de fornecedores',
        ];

        $request->validate($validacoes, $feedback);

        Produto::create($request->all());

        return redirect()->route('app.produto.index', ['title' => 'Produto']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['title' => 'Produto', 'produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $fornecedores = Fornecedor::all();
        $unidades = Unidade::all();
        return view('app.produto.create', ['title' => 'Produto', 'produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Site\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $validacoes = [
            'nome' => 'required|min:3|max:200',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'required|exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id',
        ];
        $feedback = [
            'required' => 'O campo :attribute é obrigatório!',
            'nome.min' => 'O campo nome deve conter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve conter no máximo 200 caracteres',
            'descricao.min' => 'O campo descricao deve conter no mínimo 3 caracteres',
            'descricao.max' => 'O campo descricao deve conter no máximo 2000 caracteres',
            'peso.integer' => 'O campo tem que ser numérico e do tipo inteiro',
            'unidade_id' => 'O campo deve existir na tabela de unidades',
            'fornecedor_id' => 'O campo deve existir na tabela de fornecedores',
        ];

        $request->validate($validacoes, $feedback);

        $produto->update($request->all());
        return redirect()->route('app.produto.index', ['title' => 'Produto']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('app.produto.index', ['title' => 'Produto']);
    }
}
