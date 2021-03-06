<?php

use App\Models\User;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('type', [User::TYPE_ADMIN, USER::TYPE_USER])->default(User::TYPE_USER);
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('username', 50)->nullable();
            $table->string('email')->unique();
            $table->string('mobile')->unique()->nullable();
            $table->enum('gender', ['male', 'female', 'transgender', 'other'])->nullable();
            $table->string('about')->nullable();
            $table->date('birth_date')->nullable();
            $table->enum('social_category', ['General', 'SC', 'ST', 'OBC'])->nullable();
            $table->enum('religion', ['Hindu', 'Muslim', 'Christian', 'Buddhist', 'Jain', 'Zorastrian (Parsi)', 'Sikh', 'Others'])->nullable();
            $table->boolean('is_divyangjan')->default(0);
            $table->string('password');
            $table->boolean('active')->default(true);
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->ipAddress('last_login_ip')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('mobile_verified_at')->nullable();
            $table->timestamp('password_changed_at')->nullable();
            $table->boolean('to_be_logged_out')->default(false);
            $table->string('referrer')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
