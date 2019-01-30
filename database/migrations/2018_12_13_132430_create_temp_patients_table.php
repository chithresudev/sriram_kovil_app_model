<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_patients', function (Blueprint $table) {
          // Medical Records
        $table->bigIncrements('id');
        $table->integer('district_id');
        $table->string('name')->nullable();
        $table->string('dob')->nullable();
        $table->integer('age')->nullable();
        $table->string('gender')->nullable();
        $table->string('mdcrc_no')->nullable();
        $table->string('source')->nullable();
        $table->string('patient_education')->nullable();
        $table->bigInteger('aadhar_no')->nullable();
        $table->string('disability_no')->nullable();
        $table->string('address1')->nullable();
        $table->string('address2')->nullable();
        $table->string('taluk')->nullable();
        $table->string('city')->nullable();
        $table->string('district')->nullable();
        $table->integer('pincode')->nullable();
        $table->string('state')->nullable();
        $table->bigInteger('phone')->nullable();
        $table->string('phone_relation')->nullable();
        $table->bigInteger('alternative_phone')->nullable();
        $table->string('alternative_phone_relation')->nullable();
        // Father Details
        $table->string('father_name')->nullable();
        $table->integer('father_age')->nullable();
        $table->string('father_education')->nullable();
        $table->string('father_occupation')->nullable();
        $table->bigInteger('father_income')->nullable();
        $table->bigInteger('father_phone')->nullable();
        // Mother Details
        $table->string('mother_name')->nullable();
        $table->integer('mother_age')->nullable();
        $table->string('mother_education')->nullable();
        $table->string('mother_occupation')->nullable();
        $table->bigInteger('mother_income')->nullable();
        $table->bigInteger('mother_phone')->nullable();
        $table->string('camp_district')->nullable();
        $table->string('camp_status')->nullable();
        $table->integer('status')->nullable()->default(1);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temp_patients');
    }
}
