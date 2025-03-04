<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            ProjectSeeder::class,
            DepartmentSeeder::class,
            PositionSeeder::class,
            ProfileSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();
    }
}
