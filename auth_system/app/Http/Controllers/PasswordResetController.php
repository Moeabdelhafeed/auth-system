<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PasswordResetController extends Controller
{
    // 1. Resend reset email
    public function sendResetLinkEmail(Request $request)
    {
            $request->validate(['email' => 'required|email|exists:users,email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return response()->json(['message' => __($status)], $status === Password::RESET_LINK_SENT ? 200 : 400);
    }

    // 2. Validate token from GET params
   public function validateToken(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'token' => 'required'
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return response()->json(['valid' => false, 'message' => 'User not found'], 404);
    }

    $status = Password::tokenExists($user, $request->token);

    if ($status){

        return response()->json(['valid' => $status]);
    }
    
    return response()->json(['valid' => $status], 400);
    

}


    // 3. Reset password
    public function reset(Request $request)
    {
        $request->validate([
            'token'    => 'required',
            'email'    => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? response()->json(['message' => 'Password reset successfully.'])
            : response()->json(['message' => __($status)], 400);
    }
}














