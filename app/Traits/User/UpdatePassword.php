<?php

namespace App\Traits\User;

use Laravel\Fortify\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;





trait UpdatePassword
{
    private function update_password($user, $request)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', new Password, 'confirmed'],
        ]);

        $this->password_check($user, $request->current_password);

        $user->forceFill([
            'password' => Hash::make($request->password),
        ])->save();
        Session::flash('success', 'Successfully Updated user Password.');
        return true;
    }
}
