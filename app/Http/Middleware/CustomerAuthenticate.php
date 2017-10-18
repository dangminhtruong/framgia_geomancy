<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Framgia\Response\FlashResponse;

class CustomerAuthenticate
{
    protected $flashResposne;

    public function __construct(FlashResponse $flashResponse)
    {
        $this->flashResponse = $flashResponse;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            return $next($request);
        }
        return $this->flashResponse->fail('home',  __('Hãy đăng nhập để thực hiện thao tác này'));
    }
}
