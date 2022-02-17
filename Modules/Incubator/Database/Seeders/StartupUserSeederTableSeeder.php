<?php

namespace Modules\Incubator\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StartupUserSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('startup_users')->insert([
            [
                'email' => 'userStartup@userstartup.com',
                'password' => Hash::make('userStartup@userstartup.com'),
                'first_name' => 'Jean',
                'last_name' => 'Michel',
                'startup_id' => 1,
            ]
        ]);
    }
}
