<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stud_id');
            $table->string('stu_email');
            $table->string('pw');
            $table->text('stud_name');
            $table->string('prog_code');
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
        Schema::dropIfExists('studs');
    }
}
