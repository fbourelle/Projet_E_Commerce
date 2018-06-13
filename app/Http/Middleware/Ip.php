<?php

namespace App\Http\Middleware;
use Request;
use Closure;

class Ip
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      dd(Request::ip());
      // var_dump($request->ip());
      dd($request->userAgent());
      if ($request->ip() != '192.168.0.12') {
        return $next($request);
      };
      // var_dump($request->ip());
      return response('Unauthorized.', 401);
    }
}
