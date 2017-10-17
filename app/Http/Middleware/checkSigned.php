<?php

namespace App\Http\Middleware;

use App\Framgia\Response\flashResponse;
use Closure, Auth;

class checkSigned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function __construct(FlashResponse $flashResponse)
    {
        $this->flashResponse = $flashResponse;
    }

    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            return $next($request);
        } else {

            return $this->flashResponse->fail('home', __('Need.Login'));
        }
    }
}
