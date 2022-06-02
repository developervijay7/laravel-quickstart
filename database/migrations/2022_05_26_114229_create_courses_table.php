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
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('short_name')->nullable();
            $table->string('slug')->unique();
            $table->string('level')->nullable();
            $table->string('about')->nullable();
            $table->string('image')->nullable();
            $table->string('subject')->nullable();
            $table->integer('intake')->nullable();
            $table->string('criterion')->nullable();
            $table->integer('years')->nullable();
            $table->integer('months')->nullable();
            $table->string('type')->nullable();
            $table->string('examination')->nullable();
            $table->string('statutory_body')->nullable();
            $table->string('university')->nullable();
            $table->longText('syllabus')->nullable();
            $table->integer('courseable_id');
            $table->string('courseable_type');
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
        Schema::dropIfExists('courses');
    }
};
