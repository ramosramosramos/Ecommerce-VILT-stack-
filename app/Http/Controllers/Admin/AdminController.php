<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\AdminUserResource;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\UserRole;

class AdminController
{

    public function index()
    {
        $users = User::with(['roles'])
            ->select(
                'id',
                'name',
                'email',
                'phone',
                'created_at',
            )->latest()->get();

        $roles = $users->flatMap(function ($user) {
            return $user->roles->map(function ($role) {
                return [
                    'isAuthorizedSeller' => $role->isAuthorizedSeller,
                ];
            });
        });
        $all_counts =0;
        $pending_counts = 0;
        $active_counts = 0;

        foreach ($roles as $role) {
            $all_counts+=1;
            if ($role['isAuthorizedSeller'] == false) {
                $pending_counts += 1;
            } else {
                $active_counts += 1;
            }


        }






        return inertia('Admin/Home', [
            'users' => AdminUserResource::collection($users),

              'counts'=>[
                'pending_counts' => $pending_counts,
                'active_counts'=>$active_counts,
                'roles_counts'=>$all_counts,
            ],
        ]);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
