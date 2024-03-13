<?php

namespace App\Http\Middleware;

use Closure;

class OwnCors
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
        header("Access-Control-Allow-Origin: http://127.0.0.1");

        $headers = [
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization, X-CSRF-TOKEN , X-XSRF-TOKEN',
            'Access-Control-Allow-Credentials' => 'true'
        ];
        if ($request->getMethod() == "OPTIONS") {
            return response('OK')
                ->withHeaders($headers);
        }

        $response = $next($request);
        
        // $response->headers->set('Set-Cookie', str_replace(';','; SameSite=None; Secure;',$response->headers->get('Set-Cookie')));
        foreach ($headers as $key => $value)
            $response->header($key, $value);
        return $response;
    }
}
