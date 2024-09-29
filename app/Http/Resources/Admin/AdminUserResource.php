<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;


class AdminUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => str()->mask($this->phone, '*', 9),
            'created_at' => Carbon::parse($this->created_at)->diffForHumans(),
            'roles' => $this->roles->isNotEmpty()
                ? $this->roles->map(fn($role) => [
                    'id' => $role->id,
                    'role' => $role->role ?? 'No role',
                    'isAuthorizedSeller' => $role->isAuthorizedSeller ? "Active" : "Pending",
                ])
                : [['role' => 'No role', 'isAuthorizedSeller' => 'No requests']],


        ];
    }
}
