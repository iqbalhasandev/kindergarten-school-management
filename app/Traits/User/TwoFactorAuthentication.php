<?php

namespace App\Traits\User;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Laravel\Fortify\Actions\GenerateNewRecoveryCodes;
use Laravel\Fortify\Actions\EnableTwoFactorAuthentication;
use Laravel\Fortify\Actions\DisableTwoFactorAuthentication;




trait TwoFactorAuthentication
{

    private function two_factor_authentication($user, $request)
    {
        $request->validate([
            'action' => 'required',
            'current_password' => ['required', 'string'],
        ]);
        $this->password_check($user, $request->current_password);
        switch ($request->action) {
            case 'enable':
                $this->enableTwoFactorAuthentication($user);
                break;
            case 'regenerate_code':
                $this->regenerateRecoveryCodes($user);
                break;
            case 'show_code':
                $this->showRecoveryCodes();
                break;
            case 'disable':
                $this->disableTwoFactorAuthentication($user);
                break;
            default:
                Session::flash('error', 'Invalid Action');
                break;
        }
    }

    /**
     * Enable two factor authentication for the user.
     *
     * @param  \Laravel\Fortify\Actions\EnableTwoFactorAuthentication  $enable
     * @return void
     */
    private function enableTwoFactorAuthentication($user)
    {
        $twoFaProvider = App::make('Laravel\Fortify\Contracts\TwoFactorAuthenticationProvider');

        $enable = new EnableTwoFactorAuthentication($twoFaProvider);
        $enable($user);

        Session::flash('showingQrCode', true);
        Session::flash('showingRecoveryCodes', true);
        Session::flash('success', 'Successfully Disabled Two Factor Authentication.');
    }

    /**
     * Display the user's recovery codes.
     *
     * @return void
     */
    public function showRecoveryCodes()
    {

        Session::flash('showingQrCode', false);
        Session::flash('showingRecoveryCodes', true);
    }

    /**
     * Generate new recovery codes for the user.
     *
     * @param  \Laravel\Fortify\Actions\GenerateNewRecoveryCodes  $generate
     * @return void
     */
    public function regenerateRecoveryCodes($user)
    {
        $twoFaProvider = App::make('Laravel\Fortify\Contracts\TwoFactorAuthenticationProvider');
        $generate = new GenerateNewRecoveryCodes($twoFaProvider);
        $generate($user);

        Session::flash('showingQrCode', false);
        Session::flash('showingRecoveryCodes', true);
        Session::flash('success', 'Successfully Recovery Code Regenerated');
    }

    /**
     * Disable two factor authentication for the user.
     *
     * @param  \Laravel\Fortify\Actions\DisableTwoFactorAuthentication  $disable
     * @return void
     */
    private function disableTwoFactorAuthentication($user)
    {
        $twoFaProvider = App::make('Laravel\Fortify\Contracts\TwoFactorAuthenticationProvider');

        $disable = new DisableTwoFactorAuthentication($twoFaProvider);
        $disable($user);

        Session::flash('showingQrCode', false);
        Session::flash('showingRecoveryCodes', false);
        Session::flash('success', 'Successfully Disabled Two Factor Authentication.');
    }
    /**
     * Determine if two factor authentication is enabled.
     *
     * @return bool
     */
    private function getEnabledProperty($user)
    {
        return !empty($user->two_factor_secret);
    }
}
