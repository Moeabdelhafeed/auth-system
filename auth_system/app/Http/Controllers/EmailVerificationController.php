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
       return redirect(config('app.frontend_url') . '/verify-result?status=expired');
    }

    if ($user->hasVerifiedEmail()) {
       return redirect(config('app.frontend_url') . '/verify-result?status=verified');
    }

    $user->markEmailAsVerified();
    event(new Verified($user));

        return redirect(config('app.frontend_url') . '/verify-result?status=success'); 
    }
}