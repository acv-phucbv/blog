<?php

namespace App\Services\Production;

use App\Models\User;
use App\Services\Interfaces\UserServiceInterface;
use DB;
use Image;

class UserService extends BaseService implements UserServiceInterface
{
    /**
     * Create new user
     *
     * @param array $inputs
     * @return User
     * @throws \Exception
     */
    public function createUser(array $inputs)
    {
        if (!in_array($inputs['role'], \App\Models\User::roles())) {
            $inputs['role'] = \App\Models\User::ROLE_AUTHOR;
        }

        if (!in_array($inputs['gender'], \App\Models\User::genders())) {
            unset($inputs['gender']);
        }

        $inputs['birthday'] ? $inputs['birthday'] = \Carbon\Carbon::createFromFormat('d/m/Y', $inputs['birthday'])->format('Y-m-d') : null;

        return User::create($inputs);
    }

    /*

     * Delete User Data
     *
     * @param User $user
     *
     * @return Bool
     */
    public function deleteUser(User $user)
    {
        return $user->delete();
    }

    /* Update User Data
    *
    * @param array $input
    * @param User $user
    * @return User
    */
    public function updateUser(User $user, array $inputs)
    {
        if (!in_array($inputs['role'], \App\Models\User::roles())) {
            $inputs['role'] = \App\Models\User::ROLE_AUTHOR;
        }

        if (!in_array($inputs['gender'], \App\Models\User::genders())) {
            unset($inputs['gender']);
        }

        $inputs['birthday'] ? $inputs['birthday'] = \Carbon\Carbon::createFromFormat('d/m/Y', $inputs['birthday'])->format('Y-m-d') : null;
        if (!$inputs['password']) {
            unset($inputs['password']);
        }

        return $user->update($inputs);
    }

    /**
     * Update Profile
     *
     * @param User $user
     * @param array $inputs
     * @return User
     */
    public function updateProfile(User $user, array $inputs)
    {
        if (!in_array($inputs['gender'], \App\Models\User::genders())) {
            unset($inputs['gender']);
        }

        $inputs['birthday'] ? $inputs['birthday'] = \Carbon\Carbon::createFromFormat('d/m/Y', $inputs['birthday'])->format('Y-m-d') : null;

        if (isset($inputs['avatar'])) {
            if (isset($user->avatar)) {
                $oldAvatar = public_path('uploads/avatar/'.$user->avatar);
                \File::delete($oldAvatar);
            }
            $inputs['avatar'] = self::uploadImage($inputs['avatar']);
        }

        return $user->update($inputs);
    }

    public function uploadImage($image) {
        $path = public_path('uploads/avatar/');
        $filename  = time() . '.' . $image->getClientOriginalExtension();
        $image->move($path, $filename);
        return $filename;
    }
}
