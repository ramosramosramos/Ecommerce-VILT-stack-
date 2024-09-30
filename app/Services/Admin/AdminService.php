<?php

namespace App\Services\Admin;

use App\Models\User;

class AdminService
{
    public function getUsers()
    {
        $users = User::with(['roles'])
            ->select(
                'id',
                'name',
                'email',
                'phone',
                'created_at',
            )->latest()->get();
        return $users;
    }
}
