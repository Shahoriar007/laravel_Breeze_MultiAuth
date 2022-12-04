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
        Schema::create('casefines', function (Blueprint $table) {
            $table->id();
            $table->string('userId')->nullable();
            $table->string('caseId')->nullable();
            $table->string('caseCode')->nullable();
            $table->string('fineAmmount')->nullable();
            $table->string('casePhoto')->nullable();
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
        Schema::dropIfExists('casefines');
    }
};
