<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Rules\CheckSamePassword;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    // Update user profile
    public function updateProfile (Request $request)
    {
        $user = auth()->user();

        $this->validate($request, [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
        ]);
        
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ]);

        return new UserResource($user);
        
    }


    // Update user password
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => ['required', new MatchOldPassword],
            'password' => ['required', 'confirmed', 'min:8',new CheckSamePassword],
        ]);

        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);


        return response()->json([
            'message' => 'Password updated'
        ], 200);
    }
}
