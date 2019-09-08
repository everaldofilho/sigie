<?php

namespace App\Http\Middleware;

use App\Models\Instituicao;
use Closure;
use Illuminate\Support\Facades\Auth;

class InstituicaoAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!session()->has('instituicao') || session()->get('instituicao') <= 0) {
            $instituicao = Instituicao::where('status', 1)->get()->first();
            session()->put('instituicao', $instituicao->id);
        }
        return $next($request);
    }
}
