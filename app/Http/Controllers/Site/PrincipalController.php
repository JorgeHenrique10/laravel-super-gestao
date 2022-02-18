<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\MotivoContato;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function index()
    {
        $motivo_contatos = MotivoContato::all();
        return view('site.principal', ['title' => 'Home', 'motivo_contatos' => $motivo_contatos]);
    }
}
