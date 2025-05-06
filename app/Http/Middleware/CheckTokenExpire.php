<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTokenExpire
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    $token = $request->user()->currentAccessToken();

    if ($token && $token->expires_at && $token->expires_at->isPast()) {
      return response()->json(['message' => 'Token has expired.'], 401);
    }

    return $next($request);
  }
}
