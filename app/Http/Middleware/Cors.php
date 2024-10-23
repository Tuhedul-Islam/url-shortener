<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
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
       /*return $next($request)
       ->header('Access-Control-Allow-Origin' , '*')
       ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
       ->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, Application, application/json')
       ->header('Access-Control-Allow-Credentials', true)
       ->header('Accept', 'application/json');*/

       $response = $next($request);

       $response->headers->set('Access-Control-Allow-Origin' , '*');
       $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
       $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, Application');
       $response->headers->set('Access-Control-Allow-Credentials', true);

       $response->headers->set('Content-Type', '*');
       $response->headers->set('Cache-Control', 'public');
       $response->headers->set('Content-Description', 'File Transfer');


       return $response;
   }
}
