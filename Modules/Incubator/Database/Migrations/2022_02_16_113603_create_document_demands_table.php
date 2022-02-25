<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentDemandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_demands', function (Blueprint $table) {
            $table->id();
            $table->foreignId('startup_id')->constrained();
            $table->foreignId('helper_user_id')->nullable()->constrained('users', 'id');
            $table->boolean('by_startup');
            // $table->text('description');
            $table->string('document_title');
            $table->string('document_description');
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
        Schema::dropIfExists('document_demands');
    }
}
