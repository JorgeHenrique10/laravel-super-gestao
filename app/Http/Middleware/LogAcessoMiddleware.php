<?php

namespace App\Http\Middleware;

use App\Models\LogAcesso;
use Closure;
use Illuminate\Http\Request;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->server('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log' => "O ip de acesso foi: $ip para a rota: $rota"]);
        $retorno = $next($request);
        $retorno->setStatusCode(201, "Status modificado");

        return $next($request);;
    }
}
