<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_families', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id');
            $table->enum('type', ['father', 'mother', 'spouse', 'guardian']);
            $table->string('species')->nullable();
            $table->string('name')->nullable();
            $table->string('status')->nullable();
            $table->integer('age')->nullable();
            $table->string('education')->nullable();
            $table->string('edu_other')->nullable();
            $table->string('occupation')->nullable();
            $table->string('job_other')->nullable();
            $table->bigInteger('income')->nullable();
            $table->bigInteger('phone')->nullable();
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
        Schema::dropIfExists('patient_families');
    }
}
