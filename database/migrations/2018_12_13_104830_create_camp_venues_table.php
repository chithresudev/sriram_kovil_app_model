<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampVenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camp_venues', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('district_id')->nullable();
            $table->integer('camp_id')->nullable();
            $table->string('venue')->nullable();
            $table->string('address')->nullable();
            $table->string('contact_name')->nullable();
            $table->bigInteger('contact_mobile')->nullable();
            $table->string('contact_email')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('camp_venues');
    }
}
