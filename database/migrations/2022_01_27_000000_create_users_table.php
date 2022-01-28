<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('companyname')->nullable();
            $table->string('exp_in_month')->nullable();
            $table->string('exp_in_year')->nullable();
            $table->string('title')->nullable();
            $table->string('resume')->nullable();
            $table->string('path', 255)->nullable();
            $table->string('access')->default(1);
            $table->bigInteger('role_id')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}