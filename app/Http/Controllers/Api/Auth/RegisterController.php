<?php

namespace App\Http\Controllers\Api\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    /**
     * @param RegisterRequest $request
     * @return JsonResponse 
     */

        public function __invoke(RegisterRequest $request) : JsonResponse
    {
        $data = $request->validated();
        $user= User::create($data);
        
        event(new Registered($user));

        return response()->json([
            'message' => "Successfully Registered"
        ]);

    }
    
}
