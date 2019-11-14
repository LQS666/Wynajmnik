<?php

namespace App\Traits;

use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

trait ChangePasswords
{
    use RedirectsUsers;

    /**
     * Display the password change view.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showChangeForm()
    {
        return view('auth.passwords.change');
    }

    /**
     * Handle a change password request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function change(Request $request)
    {
        $user = $this->user();

        $old_password = $request->get('password-old');
        $new_password = $request->get('password-new');

        if (!Hash::check($old_password, $user->getAuthPassword())) {
            return redirect()->back()
                             ->with('errors', 'Your current password does not matches with the password you provided. Please try again');
        }

        if (strcmp($old_password, $new_password) === 0) {
            return redirect()->back()
                             ->with('errors', 'New Password cannot be same as your current password. Please choose a different password');
        }

        $this->validator($request->all())->validate();

        $user->password = bcrypt($new_password);
        $user->save();

        return $this->changed($request, $user) ?: redirect($this->redirectPath());
    }

    /**
     * Get the currently authenticated user
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable
     */
    protected function user()
    {
        return Auth::user();
    }

    /**
     * The user password has been changed.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function changed(Request $request, $user)
    {
        //
    }
}
