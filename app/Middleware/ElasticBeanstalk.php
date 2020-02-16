<?php
namespace BRM\ElasticBeanstalk\app\Middleware;

use Closure;
use Illuminate\Http\Request;

class ElasticBeanstalk
{
    /**
     * Handle an incoming request.
     *
     * Put this file in app/Http/Middleware
     * Read more here https://github.com/peppeocchi/laravel-elb-middleware
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request->setTrustedProxies(['127.0.0.1', $request->server->get('REMOTE_ADDR')], Request::HEADER_X_FORWARDED_ALL);
        return $next($request);
    }
}
