<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SobreNosController extends Controller
{
    public function index()
    {
        return view('site.sobre-nos', ['title' => 'Sobre Nós']);
    }
}
