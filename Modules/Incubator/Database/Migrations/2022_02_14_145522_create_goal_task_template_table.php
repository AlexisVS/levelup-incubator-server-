<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalTaskTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goal_task_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status');
            // $table->foreignId('goal_template_id')->nullable()->constrained(); // this key in this model is normally a foreign key reported as their name
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goal_task_templates');
    }
}
