<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AttributeMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_master', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',200);
            $table->string('code',50);
            $table->enum('type', ['TEXT', 'DROPDOWN']);
            $table->longText('options')->nullable();
            $table->integer('created_by');
            $table->timestamps();

            // $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
