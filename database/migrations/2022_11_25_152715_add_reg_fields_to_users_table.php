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
        Schema::table('users', function (Blueprint $table) {
            // Personal Info
            $table->string('phone')->unique();
            // $table->string('name');
            $table->string('nid')->nullable();
            $table->string('gender')->nullable();
            $table->string('birthDate')->nullable();
            $table->string('bloodGroup')->nullable();
            // $table->string('password');
            $table->string('photo')->nullable();

            // Vehicle Info
            $table->string('city')->nullable();
            $table->string('vehicle')->nullable();
            $table->string('drivingLicense')->nullable();
            
            // Vehicle Info
            $table->string('cityName')->nullable();
            $table->string('category')->nullable();
            $table->string('number')->nullable();

            $table->string('transactionId')->nullable();
            $table->string('refCode')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
