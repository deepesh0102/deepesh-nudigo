<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->date('date_of_birth')->nullable();
            $table->text('address')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->integer('zip_code')->nullable();
            $table->integer('contact_number')->nullable();
            $table->string('profile_picture')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('email_verified_status')->default(0)->comment("0:Not Verify; 1:Varified");
            $table->string('api_token',60)->unique();
            $table->string('password');
            $table->tinyInteger('status')->default(0)->comment("0:Inactive; 1:Active; 2:Banned");
            $table->boolean('is_delete')->default(0)->comment("0:Not Deleted; 1:Deleted");
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
