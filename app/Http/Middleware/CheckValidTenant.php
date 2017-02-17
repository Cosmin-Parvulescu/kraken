<?php

namespace App\Http\Middleware;

use Closure;

use App\Tenant;

class CheckValidTenant
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
      /* Tre să văd cum fac sesiunea să expire */
      
      /*
       *  if($request->session()->has('tenant')) {
       *    return $next($request);
       *  }
       */
      
      $subdomain = explode('.', $request->getHost())[0];
      $tenant = Tenant::where('subdomain', $subdomain)->first(); // aici va trebui pus un cache...
      
      if($tenant == null) {
        abort(404);
      }
      
      $request->session()->put('tenant', $tenant);
      
      return $next($request);
    }
}
