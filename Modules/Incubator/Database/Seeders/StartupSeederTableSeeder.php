<?php

namespace Modules\Incubator\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StartupSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('startups')->insert([
            [
                'name' => 'Super Startup',
                'description' => 'Une startup qui vous veut du bien.',
            ]
        ]);
    }
}
