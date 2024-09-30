<?php

namespace App\Services\Admin;

use App\Models\User;

class CalculatorService
{

    public function getRoleCounts( $users)
    {
        $totals = null;
        $roles = $users->flatMap(function ($user) {
            return $user->roles->map(function ($role) {
                return [
                    'isAuthorizedSeller' => $role->isAuthorizedSeller,
                ];
            });
        });
        $all_counts = 0;
        $pending_counts = 0;
        $active_counts = 0;

        foreach ($roles as $role) {
            $all_counts += 1;
            if ($role['isAuthorizedSeller'] == false) {
                $pending_counts += 1;
            } else {
                $active_counts += 1;
            }


        }



        $totals = [
            'totals' =>
                [

                    'all_counts' => $all_counts,
                    'pending_counts' => $pending_counts,
                    'active_counts' => $active_counts,
                ]
        ];
        return $totals;
    }

}
