<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStartupNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('startup_notifications', function (Blueprint $table) {
            $table->id();
            $table->boolean('viewed');
            $table->foreignId('startup_id')->constrained();
            $table->integer('startupNotifiable_id');
            $table->string('startupNotifiable_type');
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
        Schema::dropIfExists('startup_notifications');
    }
}
