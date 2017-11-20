<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Http\Requests\ShowUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;

class UsersController extends Controller
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
        $this->middleware('admin')->except('index', 'show');
        $this->userService = $userService;
    }

    /**
     * Display a listing of the User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('deleted_at', null)->where('role', '>' , 1)->paginate(15);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new User.
     * [U0001] Create user
     * GET: admin/users/create
     *
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created User in storage.
     * [U0001] Create user
     * POST: admin/users
     *
     * @param  \App\Http\Requests\StoreUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        if ($this->userService->createUser($request->except('_token'))) {
            $request->session()->flash('message-success', trans('common.create_success'));
            return redirect(route('users.index'));
        }

        abort(500, trans('common.create_failed'));
    }

    /**
     * Display the specified User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ShowUserRequest $request, User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EditUserRequest $request, User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified User in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if ($this->userService->updateUser($user, $request->except(['_method', '_token']))){
            $request->session()->flash('flash_success', trans('common.update_success'));
            return redirect()->route('users.index');
        }

        abort(500, trans('common.update_failed'));
    }

    /**
     * Show form edit user password
     * GET /admin/users/{user}/password
     */
    public function editPassword(User $user)
    {
//        return view('admin.users.edit_password', compact('user'));
    }

    /**
     * Update the specified User in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(UpdateUserPasswordRequest $request, User $user)
    {
//        if ($user->update(['password' => $request->input('password')])){
//            $request->session()->flash('flash_success', trans('common.update_success'));
//            return redirect()->route('admin.users.index');
//        }
//
//        abort(500, trans('common.update_failed'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
//        if ($this->userService->deleteUser($user)) {
//            session()->flash('flash_warning', trans('common.delete_success'));
//            return redirect(route("admin.users.index"));
//        }
//
//        abort(500, trans('common.delete_failed'));
    }
}
