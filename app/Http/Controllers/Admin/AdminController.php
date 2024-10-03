<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\AdminUserResource;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\UserRole;
use App\Services\Admin\AdminService;
use App\Services\Admin\CalculatorService;

class AdminController
{
    // get users by admin and counts
    public function index(AdminService $adminService, CalculatorService $calculatorService)
    {
        $users = $adminService->getUsers();
        ///calculator uses flatmap and forloops
        $totals = $calculatorService->getRoleCounts($users);
        return inertia('Admin/Home', [
            'users' => AdminUserResource::collection($users),
            'counts' => $totals,
        ]);
    }


    public function create()
    {

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
    public function update(UserRole $role)
    {
        $authorize = $role->isAuthorizedSeller ? false : true;
        $role->update([
            'isAuthorizedSeller' => $authorize
        ]);
        return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
