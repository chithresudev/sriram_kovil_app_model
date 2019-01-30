<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
          $table->increments('id');
          $table->bigInteger('patient_id');
          $table->boolean('birth_complication')->nullable();
          $table->string('birth_complication_val')->nullable();
          $table->boolean('motor_milestones')->nullable();
          $table->string('motor_milestones_val')->nullable();
          $table->integer('child_walk')->nullable();
          $table->string('child_walk_ruleout')->nullable();
          $table->integer('age_of_symptom')->nullable();
          $table->string('first_symptom_enquire')->nullable();
          $table->string('enquire_questions')->nullable();
          $table->string('enquire_died_family')->nullable();
          $table->string('first_symptom_noted')->nullable();
          $table->boolean('frequent_falls')->nullable();
          $table->integer('frequent_falls_age')->nullable();
          $table->boolean('difficulty_walking')->nullable();
          $table->integer('difficulty_walking_age')->nullable();
          $table->boolean('difficulty_climbing')->nullable();
          $table->integer('difficulty_climbing_age')->nullable();
          $table->boolean('difficulty_sitting')->nullable();
          $table->integer('difficulty_sitting_age')->nullable();
          $table->string('weakness_of_neck')->nullable();
          $table->text('exam_hypertrophy')->nullable();
          $table->boolean('velley_sign')->nullable();
          $table->string('lordosis')->nullable();
          $table->string('kyphoscoliosis')->nullable();
          $table->string('deformities')->nullable();
          $table->string('gowers_sign')->nullable();
          $table->string('toe_walking')->nullable();
          $table->string('waddling_gait')->nullable();
          $table->text('findings_others')->nullable();
          $table->string('proximal_muscle')->nullable();
          $table->string('pelvic_girdle')->nullable();
          $table->boolean('symmetric_involvement')->nullable();
          // $table->string('hypertrophy')->nullable();
          // $table->string('hypotrophy')->nullable();
          $table->string('hypotonia')->nullable();
          $table->string('sensory_system')->nullable();
          $table->string('plantar_reflex')->nullable();
          $table->text('diagnosis')->nullable();
          $table->integer('muscular_dystrophy')->nullable();
          $table->text('muscular_dystrophy_query')->nullable();
          $table->text('clinical_muscular_dystrophy')->nullable();
          $table->integer('spinal_muscular')->nullable();
          $table->text('spinal_muscular_query')->nullable();
          $table->string('clinical_spinal_muscular')->nullable();
          $table->integer('others')->nullable();
          $table->string('clinical_others')->nullable();
          $table->string('clinical_others_details')->nullable();
          $table->boolean('doctor_genetic_test')->nullable();
          $table->string('doctor_sample_type')->nullable();
          $table->string('doctor_sample_others_details')->nullable();
          $table->string('comments')->nullable();
          $table->text('severity_disability')->nullable();
          $table->string('doctor_name')->nullable();
          $table->string('doctor_speciality')->nullable();

          //Doctor Flag
          $table->string('flag_doctor_edited_by')->nullable();
          $table->dateTime('flag_doctor_edited_at')->nullable();
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
        Schema::dropIfExists('doctors');
    }
}
