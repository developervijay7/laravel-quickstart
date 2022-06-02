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
        Schema::create('colleges', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('short_name')->nullable();
            $table->string('code')->nullable();
            $table->string('aishe_code')->nullable();
            $table->string('logo')->nullable();
            $table->text('about')->nullable();
            $table->enum('location_type', ['Urban', 'Rural']);
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('web_address')->nullable();
            $table->decimal('total_area')->nullable();
            $table->decimal('total_constructed_area')->nullable();
            $table->string('management_name')->nullable();
            $table->string('primary_university')->nullable();
            $table->string('body')->nullable();
            $table->year('established')->nullable();
            $table->year('affiliated')->nullable();
            $table->string('type')->nullable();
            $table->string('management')->nullable();
            $table->boolean('girls_only')->default(0);
            $table->boolean('hostel')->default(0);
            $table->boolean('faculty_quarters')->default(0);
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
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
        Schema::dropIfExists('colleges');
    }
};
