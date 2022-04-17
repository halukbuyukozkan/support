<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Exceptions\InvalidSignatureException;
use Illuminate\Routing\Middleware\ValidateSignature as Middleware;

class ValidateSignature extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $relative
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Routing\Exceptions\InvalidSignatureException
     */
    public function handle($request, Closure $next, $relative = null)
    {
        if ($this->hasValidSignature($request, $relative !== 'relative')) {
            return $next($request);
        }

        throw new InvalidSignatureException;
    }

    /**
     * Determine if the given request has a valid signature.
     * copied and modified from
     * vendor/laravel/framework/src/Illuminate/Routing/UrlGenerator.php:363
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $absolute
     * @return bool
     */
    public function hasValidSignature(Request $request, $absolute = true)
    {
        $url = $absolute ? $request->url() : '/' . $request->path();

        // THE FIX:
        if (config('app.force_https')) {
            $url = str_replace('http://', 'https://', $url);
        }

        $queryString = ltrim(preg_replace('/(^|&)signature=[^&]+/', '', $request->server->get('QUERY_STRING')), '&');

        $expires = $request->query('expires');

        $signature = hash_hmac('sha256', rtrim($url . '?' . $queryString, '?'), config('app.key'));

        return hash_equals($signature, (string) $request->query('signature', '')) && !($expires && Carbon::now()->getTimestamp() > $expires);
    }
}
