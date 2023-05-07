<?php

namespace App\Http\Controllers\Backend\User;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Class DeletedUserController.
 */
class DeletedUserController extends Controller
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * DeletedUserController constructor.
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
        return view('backend.auth.user.deleted');
    }

    /**
     * @param  User  $deletedUser
     *
     * @return mixed
     * @throws GeneralException
     */
    public function update(User $deletedUser)
    {
        $this->userService->restore($deletedUser);

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('The user was successfully restored.'));
    }

    /**
     * @param  User  $deletedUser
     *
     * @return mixed
     * @throws GeneralException
     */
    public function destroy(User $deletedUser)
    {
        abort_unless(config('quickstart.access.user.permanently_delete'), 404);

        $this->userService->destroy($deletedUser);

        return redirect()->route('admin.auth.user.deleted')->withFlashSuccess(__('The user was permanently deleted.'));
    }
}
