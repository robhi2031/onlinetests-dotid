<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyTokenApi
{
  public function handle(Request $request, Closure $next)
  {
    // Check if token is not provided
    if (!Auth::guard('api')->check()) {
      return response()->json(['message' => 'Invalid credentials'], 401);
    }

    return $next($request);
  }
}
