<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_inputs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('form_session_id');
            $table->string('name');
            $table->date('birthday');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('form_session_id')->references('id')->on('form_sessions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_inputs');
    }
}
