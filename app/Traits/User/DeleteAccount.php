<?php

namespace App\Traits\User;

use Illuminate\Support\Facades\Session;





trait DeleteAccount
{

    /**
     * Delete the current user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return \Illuminate\Http\Response
     */
    public function deleteUser($user)
    {
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        $user->delete();
        Session::flash('success', 'Successfully Account Deleted.');
    }
}
