<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\User\ClearUserSessionRequest;
use App\Models\User;

/**
 * Class UserSessionController.
 */
class UserSessionController extends Controller
{
    /**
     * @param  ClearUserSessionRequest  $request
     * @param  User  $user
     *
     * @return mixed
     */
    public function update(ClearUserSessionRequest $request, User $user)
    {
        $user->update(['to_be_logged_out' => true]);

        return redirect()->back()->withFlashSuccess(__('The user\'s session was successfully cleared.'));
    }
}

