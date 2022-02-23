<?php

namespace Modules\Incubator\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class IncubatorDatabaseSeeder extends Seeder
{

    // use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call([
            StartupSeederTableSeeder::class,
            StartupUserSeederTableSeeder::class,
            GoalAndTaskTemplateSeederTableSeeder::class
        ]);
        \Modules\Incubator\Entities\Task::factory(5)->create();
    }
}
