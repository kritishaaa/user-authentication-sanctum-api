<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\EmailVerificationRequest;
use App\Providers\RouteServiceProvider;

class VerifyEmailController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->intended(
            config('app.frontend_url') . RouteServiceProvider::LOGIN . '?verified=1'
        );
    }
}
