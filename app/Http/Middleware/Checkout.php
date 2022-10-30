<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\Cart;


class Checkout
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
        $userId = Auth::guard('customer')->id();
        $cart = Cart::where('user_id', $userId)->count();
        if(!empty(Auth::guard('customer')->check())) {

            if($cart > 0) {

                return $next($request);

            } else {

                return redirect()->route('viewCartProduct.website');

            }


        } else {

            return redirect()->route('viewCartProduct.website');

        }
    }
}
