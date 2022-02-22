<?php

namespace Modules\Incubator\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GoalAndTaskTemplateSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");

        DB::table('goal_templates')->insert([
            'name' => 'coding school',
            'description' => 'description coding school',
            'startup_id' => null,
            'helper_user_id' => null,
        ]);

        DB::table('goal_task_templates')->insert([
            [
                'name' => 'apprendre html' ,
                'status' => 'undone',
            ],
            [
                'name' => 'apprendre css' ,
                'status' => 'undone',
            ],
            [
                'name' => 'apprendre js' ,
                'status' => 'undone',
            ],
            [
                'name' => 'apprendre laravel' ,
                'status' => 'undone',
            ],
        ]);

        DB::table('pivot_goal_task_templates')->insert([
            [
                'goal_template_id' => 1 ,
                'goal_task_template_id' => 1 ,
            ],
            [
                'goal_template_id' => 1 ,
                'goal_task_template_id' => 2 ,
            ],
            [
                'goal_template_id' => 1 ,
                'goal_task_template_id' => 3 ,
            ],
            [
                'goal_template_id' => 1 ,
                'goal_task_template_id' => 4 ,
            ],
        ]);
    }
}
