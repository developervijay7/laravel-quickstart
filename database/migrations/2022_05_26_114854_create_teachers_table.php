<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('nature_of_appointment')->nullable();
            $table->string('selection_mode')->nullable();
            $table->date('date_of_joining')->nullable();
            $table->date('teaching_start_date')->nullable();
            $table->string('highest_qualification')->nullable();
            $table->string('additional_qualification')->nullable();
            $table->string('discipline')->nullable();
            $table->integer('experience')->nullable();
            $table->string('designation');
            $table->integer('department_id')->nullable();
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('teachers');
    }
};
