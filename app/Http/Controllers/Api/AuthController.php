<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    /**
     * Endpoint for application login.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Request
     */
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'success' => false,
                'message' => 'These credentials do not match our records.',
                'data' => []
            ], Response::HTTP_NOT_FOUND);
        }

        $token = $user->createToken($request->email)->plainTextToken;

        $response = [
            'success' => true,
            'message' => "Create token",
            'data' => [
                'user' => $user,
                'token' => $token
            ]
        ];

        return response($response, Response::HTTP_CREATED);
    }
}
