<?php namespace App\Http\Middleware;

class IsContributor extends IsType {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
    public function getType() {
        return "contributor";
    }

}
