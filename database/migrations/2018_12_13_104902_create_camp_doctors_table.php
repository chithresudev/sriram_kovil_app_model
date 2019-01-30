<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camp_doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('district_id')->nullable();
            $table->integer('camp_id')->nullable();
            $table->string('name')->nullable();
            $table->string('specialist')->nullable();
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('camp_doctors');
    }
}
