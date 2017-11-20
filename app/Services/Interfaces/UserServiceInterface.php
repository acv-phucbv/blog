<?php

namespace App\Services\Interfaces;

use App\Models\User;

interface UserServiceInterface
{
    public function createUser(array $inputs);
    public function deleteUser(User $user);
    public function updateUser(User $user, array $inputs);
    public function updateProfile(User $user, array $inputs);
}