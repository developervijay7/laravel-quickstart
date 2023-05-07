<?php

namespace App\Http\Controllers\Backend\User;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class UserStatusController.
 */
class DeactivatedUserController extends Controller
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * DeactivatedUserController constructor.
     *
     * @param  UserService  $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('backend.auth.user.deactivated');
    }

    /**
     * @param  Request  $request
     * @param  User  $user
     * @param $status
     *
     * @return mixed
     * @throws GeneralException
     */
    public function update(Request $request, User $user, $status)
    {
        $this->userService->mark($user, (int) $status);

        return redirect()->route(
            (int) $status === 1 || ! $request->user()->can('admin.access.user.reactivate') ?
                'admin.auth.user.index' :
                'admin.auth.user.deactivated'
        )->withFlashSuccess(__('The user was successfully updated.'));
    }
}
