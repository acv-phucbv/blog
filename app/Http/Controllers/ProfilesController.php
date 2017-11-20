<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Services\Interfaces\UserServiceInterface;

class ProfilesController extends Controller
{
    /**
     * @var UserServiceInterface
     */
    protected $userService;

    /**
     * Constructor
     */
    public function __construct(UserServiceInterface $userService)
    {
        parent::__construct();
        $this->userService = $userService;
    }

    /**
     * Show the form for editing Profile
     * GET: /admin/profile/edit
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(EditProfileRequest $request, User $user)
    {
        return view('users.profile_edit', compact('user'));
    }

    /**
     * Update Profile.
     * PUT: /admin/profile
     *
     * @param UpdateProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateProfileRequest $request, User $user)
    {
        if ($this->userService->updateProfile($user, $request->except(['_method', '_token'])))
        {
            $request->session()->flash('flash_success', trans('common.update_success'));
        } else
        {
            $request->session()->flash('flash_error', trans('common.update_failed'));
        }

        return view('users.show', ['user' => $user]);

    }
}
