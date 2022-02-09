<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
    // $user = auth()->user();
    if ($user->regStatus == 1 && $user->groupId == 1) {
      return $next($request);
    }else {
      return redirect()->route('loginAdmin');
    }

  }
}
