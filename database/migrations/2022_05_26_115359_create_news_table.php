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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('heading');
            $table->enum('type', ['Internal', 'External']);
            $table->text('body')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->date('starts_at')->nullable();
            $table->date('ends_at')->nullable();
            $table->boolean('breaking')->default(0);
            $table->boolean('active')->default(1);
            $table->boolean('approved')->default(0);
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
        Schema::dropIfExists('news');
    }
};
