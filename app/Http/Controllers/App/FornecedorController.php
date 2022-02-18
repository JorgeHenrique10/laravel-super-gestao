<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Site\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index($msg = '')
    {
        return view('app.fornecedor.fornecedor', ['title' => 'Fornecedor', 'msg' => $msg]);
    }
    public function adicionar($msg = '')
    {
        return view('app.fornecedor.adicionar', ['title' => 'Fornecedor', 'msg' => $msg]);
    }
    public function edit($id)
    {
        $fornecedor = Fornecedor::find($id);
        if ($fornecedor) {
            return view('app.fornecedor.adicionar', ['title' => 'Fornecedor', 'fornecedor' => $fornecedor]);
        }
        return view('app.fornecedor.adicionar', ['title' => 'Fornecedor', 'msg' => 'Ocorreu um erro a buscar o fornecedor!']);
    }
    public function salvar(Request $request)
    {
        $validacoes = [
            'nome' => 'required|min:3|max:200',
            'email' => 'required|email',
            'uf' => 'required|min:2|max:2',
        ];
        $feedbacks = [
            'required' => 'O campo :attribute é obrigatorio!',
            'nome.min' => 'O nome deve possuir no mínimo de 3 caracteres!',
            'nome.max' => 'O nome deve possuir no máximo de 200 caracteres!',
            'email.email' => 'O campo digitado não é válido!',
            'uf.max' => 'O campo UF deve possuir no máximo 2 caracteres!'
        ];

        $request->validate($validacoes, $feedbacks);

        if ($request->input('id')) {
            $fornecedor = Fornecedor::find($request->input('id'));
            $res = $fornecedor->update($request->all());
            if ($res) {
                return redirect()->route('app.fornecedor.adicionar', ['msg' => 'Cadastro atualizado com sucesso!']);
            } else {
                return redirect()->route('app.fornecedor.adicionar', ['msg' => 'Houve erro ao atualizar o Fornrcedor!']);
            }
        } else {
            if ($request->input('token')) {
                $fornecedor = new Fornecedor();
                $fornecedor->nome = $request->input('nome');
                $fornecedor->email = $request->input('email');
                $fornecedor->uf = $request->input('uf');
                $fornecedor->save();
            }
            // $fornecedor->create($request->all());
            return redirect()->route('app.fornecedor.adicionar', ['msg' => 'Cadastro efetuado com sucesso!']);
        }
    }
    public function delete($id)
    {
        if ($id) {
            Fornecedor::destroy($id);
        }
        return redirect()->route('app.fornecedor.index');
    }
    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::where('email', 'like', "%" . $request->input('email') . "%")
            ->where('nome', 'like', "%" . $request->input('nome') . "%")
            ->where('uf', 'like', "%" . $request->input('uf') . "%")
            ->paginate('2');

        // return view('app.fornecedor.fornecedor.listar', ['fornecedores' => $fornecedores]);
        return view('app.fornecedor.listar', ['title' => 'Fornecedor', 'fornecedores' => $fornecedores, 'request' => $request->all()]);
    }
}
