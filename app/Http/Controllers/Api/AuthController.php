<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  /**
   * Handle user login.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function login(Request $request)
  {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
      $user = Auth::user();
      $token = $user->createToken('MyApp')->accessToken;

      return response()->json([
        'user' => $user,
        'token' => $token,
      ]);
    }

    return response()->json([
      'message' => 'Invalid credentials',
    ], 401);
  }

  /**
   * Handle user logout.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function logout(Request $request)
  {
    $request->user()->token()->revoke();

    return response()->json([
      'message' => 'Successfully logged out',
    ]);
  }
}
