<?php

namespace App\Traits\User;

use Illuminate\Http\Request;
use App\Traits\User\GeneralInfo;
use App\Traits\User\DeleteAccount;
use App\Traits\User\UpdatePassword;
use App\Traits\User\BrowserSessions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Traits\User\TwoFactorAuthentication;
use Illuminate\Validation\ValidationException;

trait Settings
{
    use GeneralInfo, UpdatePassword, TwoFactorAuthentication, BrowserSessions, DeleteAccount;

    /**
     * View Use Profile
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function setting()
    {
        $data = [];
        $user = Auth::user();
        // seo
        $this->seo()->setTitle('Profile');
        $this->seo()->setDescription('Display active user profile data.');

        if (request()->active_tab == 'two-factor-authentication') {
            $data['enabled'] =  $this->getEnabledProperty($user);
            $data['showingQrCode'] =  request()->session()->get('showingQrCode', false);
            $data['showingRecoveryCodes'] =   request()->session()->get('showingRecoveryCodes', false);
        } elseif (request()->active_tab == 'browser-sessions') {
            // dd($this->getSessionsProperty());
            $data['sessions'] = $this->getSessionsProperty();
        }
        return \view('pages.admin.user.setting', ['user' => $user, 'profile' => true, 'active_tab' => request()->active_tab ?? 'general-info', 'data' => $data]);
    }
    /**
     * Update the Auth resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_setting(Request $request)
    {
        $user = Auth::user();

        switch ($request->active_tab) {
            case 'general-info':
                $this->general_info_update($user, $request);
                break;
            case 'update-password':
                $this->update_password($user, $request);
                break;
            case 'two-factor-authentication':
                $this->two_factor_authentication($user, $request);
                break;
            case 'browser-sessions':
                $this->logoutOtherBrowserSessions($user, $request);
                break;
            case 'delete-account':
                $this->deleteUser($user);
                break;
            default:
                Session::flash('error', 'No Tab Found..');
                break;
        }
        return redirect()->route('admin.user.profile.settings', ['active_tab' => $request->active_tab]);
    }
    private function password_check($user, $current_password)
    {
        if (!isset($current_password) || !Hash::check($current_password, $user->password)) {
            throw ValidationException::withMessages(['current_password' => 'The provided password does not match your current password.']);
        }
        return true;
    }
}
