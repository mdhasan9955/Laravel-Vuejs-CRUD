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
            $table->string('phone',20)->nullable();   
            $table->string('name',191)->nullable(); 
            $table->string('address',191)->nullable();  
            $table->string('email',100)->unique(); 
            $table->unsignedTinyInteger('status')->default(0)->comment('0=Inactive|1=Active'); 
            $table->string('avatar')->default('customer-profile.png');
            $table->string('password',191)->nullable();
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
