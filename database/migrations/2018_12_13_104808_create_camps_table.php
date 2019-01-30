<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('district_id');
            $table->date('camp_date');
            $table->tinyInteger('status')->default(0);

            $table->boolean('camp_status')->default(0)->nullable();
            $table->boolean('camp_steps')->default(1)->nullable();

            $table->text('preadmin')->nullable();
            $table->text('enquire1')->nullable();
            $table->text('enquire2')->nullable();
            $table->text('logistic')->nullable();

            $table->dateTime('startcamp_at')->nullable();
            $table->string('countdown')->nullable();
            $table->timestamps();
            $table->unique(['district_id', 'camp_date']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('camps');
    }
}
