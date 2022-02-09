<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class User
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
    $user = Auth::user();

    if ($user->regStatus == 1) {
      return $next($request);
    } else {
      return dd('انتظر تفعيل حسابك');
    }
  }
}
