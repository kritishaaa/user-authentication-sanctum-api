<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function __invoke(LoginRequest $request): JsonResponse
    {
        $request->authenticate();
        $token= auth()->user()->createToken('personal-token')->plainTextToken;

        return response()->json([
            'message'=>'Logged In sucessfully',
            'token'=> $token
        ]);
    }
}
