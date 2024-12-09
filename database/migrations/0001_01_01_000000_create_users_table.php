<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('user');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('user_role', ['user', 'admin']);
            $table->string('user_adress')->nullable();
            $table->string('user_phone')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        DB::table('users')->insert(
            [
                'user' => 'Mariana',
                'email' => 'test@gmail.com',
                'password' => \Hash::make('password'),
                'user_role' => 'admin',
                'created_at' => now()
            ],

        );

        DB::table('users')->insert(
            [
                'user'          => 'Cliente',
                'email'         => 'cliente@gmail.com',
                'password'      => \Hash::make('cliente'),
                'user_role'     => 'user',
                'user_adress'   => 'Doctor Pedro Ignacio Rivera 2655 6B',
                'user_phone'    => '56984587',
                'created_at'    => now()
            ],

        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
