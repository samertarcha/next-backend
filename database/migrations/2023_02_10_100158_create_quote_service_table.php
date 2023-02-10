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
    Schema::create('quote_service', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('quote_id')->unsigned();
        $table->integer('service_id')->unsigned();
        $table->timestamps();

        $table->foreign('quote_id')->references('id')->on('quotes')->onDelete('cascade');
        $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quote_service');
    }
};
