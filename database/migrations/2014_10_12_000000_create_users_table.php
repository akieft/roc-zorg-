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
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
//            $table->string('Role')->nullable(false);
            $table->string('contact_person')->nullable();
            $table->string('study')->nullable();
            $table->string('email')->unique()->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('teacher_function')->nullable();
            $table->string('teacher_availability')->nullable();
            $table->string('name_company')->nullable();
            $table->string('address_company')->nullable();
            $table->string('type_company')->nullable();
            $table->string('phone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
