<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_inputs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('form_session_id');
            $table->string('street');
            $table->integer('number');
            $table->string('cep');
            $table->string('city');
            $table->string('state');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('form_session_id')->references('id')->on('form_sessions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address_inputs');
    }
}
