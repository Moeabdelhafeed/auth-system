<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function resend(Request $request){
    if ($request->user()->hasVerifiedEmail()) {
        return response()->json(['message' => 'Already verified'], 400);
    }

    $request->user()->sendEmailVerificationNotification();

    return response()->json(['message' => 'Verification email resent']);
    }


    public function verify(Request $request, $id, $hash){
          $user = User::findOrFail($id);

    if (! hash_equals(sha1($user->email), $hash)) {
        return response()->json(['message' => 'Invalid verification link'], 403);
    }

    if ($user->hasVerifiedEmail()) {
        return response()->json(['message' => 'Email already verified.'], 200);
    }

    $user->markEmailAsVerified();
    event(new Verified($user));

        return redirect(config('app.frontend_url') . '/'); 
    }
}