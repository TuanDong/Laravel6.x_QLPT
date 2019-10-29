<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = ['name' => $request->name, 'password' => $request->password];

        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json(['error'=>true,'message' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function logout(Request $request)
    {
        $token = $request->header( 'Authorization' );
        try {
            JWTAuth::parseToken()->invalidate( $token );
            return response()->json(['error' =>false,'message' => 'Successfully logged out'],200);
        } catch (\Throwable $th) {
            return response()->json(['error' =>true,'message' => 'Fail logged out'],401);
        }

    }

    public function getAuthenticatedUser()
            {
                    try {

                            if (! $user = JWTAuth::parseToken()->authenticate()) {
                                    return response()->json(['user_not_found'], 404);
                            }

                    } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

                            return response()->json(['token_expired'], $e->getStatusCode());

                    } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

                            return response()->json(['token_invalid'], $e->getStatusCode());

                    } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

                            return response()->json(['token_absent'], $e->getStatusCode());

                    }

                    return response()->json(compact('user'));
            }

    protected function respondWithToken($token)
    {
        return response()->json([
            'error'        => false,
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => JWTAuth::factory()->getTTL() * 60,
            'message'      => 'Success'
        ])->header('Content-Type', 'application/json');
    }
}
