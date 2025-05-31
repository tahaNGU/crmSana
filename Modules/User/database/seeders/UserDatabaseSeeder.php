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
    }
}
