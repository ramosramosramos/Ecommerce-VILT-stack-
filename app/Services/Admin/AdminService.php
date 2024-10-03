<?php

namespace App\Services\Admin;

use App\Models\User;

class AdminService
{
    public function getUsers()
    {
        $users = User::with(['roles'])
        ->select(
            'users.id',     // Specify the table for id
            'users.name',   // Specify the table for name
            'users.email',  // Specify the table for email
            'users.phone',  // Specify the table for phone
            'users.created_at' // Specify the table for created_at
        )
        ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
        ->orderBy('user_roles.isAuthorizedSeller', 'asc')
        ->latest('users.created_at') // Use latest with explicit column to avoid ambiguity
        ->get();
        return $users;
    }
}
