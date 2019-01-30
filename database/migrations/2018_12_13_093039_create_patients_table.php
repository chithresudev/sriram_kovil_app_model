<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {

            // Patient details
            $table->bigIncrements('id');
            $table->integer('district_id');
            $table->integer('camp_id')->nullable();
            $table->date('camp_date')->nullable();
            $table->string('name');
            $table->string('dob')->nullable();
            $table->text('actual_dob')->nullable();
            $table->integer('age')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('source')->nullable();
            $table->string('source_others')->nullable();
            $table->text('source_referal')->nullable();
            $table->text('source_health')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->string('phone_relation')->nullable();
            $table->bigInteger('alternative_phone')->nullable();
            $table->string('alternative_phone_relation')->nullable();


            // Patient education details
            $table->string('patient_education')->nullable();
            $table->string('patient_edu_other')->nullable();
            $table->string('patient_discon_reason')->nullable();
            $table->string('patient_occupation')->nullable();
            $table->string('patient_job_other')->nullable();
            $table->bigInteger('patient_income')->nullable();
            $table->string('patient_health_status')->nullable();
            $table->string('patient_decease_details')->nullable();
            $table->integer('patient_attend_camp')->nullable();
            $table->string('patient_notattend_details')->nullable();
            $table->boolean('ambulation_status')->nullable();
            $table->integer('lost_of_ambulation')->nullable();
            $table->boolean('aadhar_status')->nullable();
            $table->boolean('aadhar_available_status')->nullable();
            $table->bigInteger('aadhar_no')->nullable();
            $table->string('aadhar_refer_no')->nullable();
            $table->boolean('disability_no_status')->nullable();
            $table->boolean('disability_available_status')->nullable();
            $table->string('disability_no')->nullable();
            $table->string('marital_status')->nullable();
            $table->integer('no_of_male')->nullable();
            $table->integer('no_of_female')->nullable();
            $table->enum('demographic_status', ['urban', 'rural'])->nullable();

            // Patient sibling details
            $table->integer('no_of_sibling')->nullable();
            $table->integer('no_of_male_sibling')->nullable();
            $table->integer('no_of_female_sibling')->nullable();
            $table->integer('sibling_affected_male')->nullable();
            $table->string('affected_male_details')->nullable();
            $table->integer('sibling_affected_female')->nullable();
            $table->string('affected_female_details')->nullable();
            $table->integer('sibling_expired_male')->nullable();
            $table->string('expired_male_details')->nullable();
            $table->integer('sibling_expired_female')->nullable();
            $table->string('expired_female_details')->nullable();

            //Reception Flag
            $table->string('flag_reception_edited_by')->nullable();
            $table->dateTime('flag_reception_edited_at')->nullable();


            $table->enum('camp_status',
              [ 'precamp', 'medical', 'reception', 'doctor',
                'counselling', 'notest', 'blooddraw',
                'physio', 'hobbies','physio_hobbies',
                'hobbies_physio', 'ta'
              ])->nullable();

            $table->text('profile_img')->nullable();
            $table->text('signature_img')->nullable();

            //Enquire and Eligible Camp
            $table->text('call_remarks')->nullable();
            $table->integer('flag_camp_status')->nullable()->default(0);
            $table->integer('flag_enquire_status')->nullable()->default(0);
            $table->integer('print_letter')->nullable()->default(0);
            $table->integer('print_label')->nullable()->default(0);
            $table->integer('letter_code')->nullable()->unique();
            $table->integer('letter_status')->nullable();
            $table->boolean('secondcall_status')->nullable()->default(0);
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
        Schema::dropIfExists('patients');
    }
}
