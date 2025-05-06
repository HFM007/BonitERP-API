<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Laravel\Sanctum\PersonalAccessToken;

class CheckTokenExpire
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    $accessToken = $request->bearerToken();
    if (!$accessToken) {
      return response()->json([
        'status' => 0,
        'message' => 'Token tidak ditemukan.'
      ], 404);
    }

    $tokenId = explode('|', $accessToken)[0];
    $token = PersonalAccessToken::find($tokenId);

    if (!$token || $token->expires_at < now()) {
      return response()->json([
        'status' => 0,
        'message' => 'Token sudah expired.'
      ], 404);
    }

    return $next($request);
  }
}
