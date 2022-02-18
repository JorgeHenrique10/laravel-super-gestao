<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\MotivoContato;
use App\Models\Site\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function index()
    {
        $motivo_contatos = MotivoContato::all();
        return view('site.contato', ['title' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }
    public function create(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required|min:3',
                'telefone' => 'required',
                'email' => 'required|email',
                'motivo_contato_id' => 'required',
                'mensagem' => 'required'
            ],
            [
                'required' => 'o campo :attribute precisa ser preenchido!'
            ]
        );

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
