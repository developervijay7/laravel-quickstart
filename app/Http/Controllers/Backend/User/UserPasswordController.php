<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\User\EditUserPasswordRequest;
use App\Http\Requests\Backend\User\UpdateUserPasswordRequest;
use App\Models\User;
use App\Services\UserService;
use Throwable;

/**
 * Class UserPasswordController.
 */
class UserPasswordController extends Controller
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * UserPasswordController constructor.
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param EditUserPasswordRequest $request
     * @param User $user
     *
     * @return mixed
     */
    public function edit(EditUserPasswordRequest $request, User $user)
    {
        return view('backend.auth.user.change-password')
            ->withUser($user);
    }

    /**
     * @param UpdateUserPasswordRequest $request
     * @param User $user
     *
     * @return mixed
     * @throws Throwable
     */
    public function update(UpdateUserPasswordRequest $request, User $user)
    {
        $this->userService->updatePassword($user, $request->validated());

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('The user\'s password was successfully updated.'));
    }
}
