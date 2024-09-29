<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserRole>
 */
class UserRoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>random_int(1,150),
            'role'=>['seller','customer'][array_rand(['seller,customer'],1)],
            'isAuthorizedSeller'=>[false,true][array_rand([false,true])],
        ];
    }
}
