<?php

namespace Modules\Task\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Task\Models\Category;

class TaskDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1;$i<=10;$i++){
            Category::create([
                "title"=>"task ".$i
            ]);
        }
    }
}
