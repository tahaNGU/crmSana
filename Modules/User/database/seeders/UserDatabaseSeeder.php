<?php

namespace Modules\User\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "taha samadi",
            "email" => "tahangudev@gmail.com",
            "password" => "neverGiveUp",
            "is_admin" => true
        ]);
        for ($i=1;$i<=5;$i++){
            User::create([
                "name"=>fake()->name,
                'email'=>fake()->email,
                'password'=>"123456"
            ]);
        }
    }
}
