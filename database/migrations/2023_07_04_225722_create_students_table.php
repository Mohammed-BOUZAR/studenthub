<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 20);
            $table->string('lastname', 20);
            $table->string('fathername', 20);
            $table->string('rollnum', 20);
            $table->string('password', 20);
            $table->string('stdemail', 50);
            $table->integer('session');
            $table->string('gender', 10);
            $table->string('dep', 50);
            $table->string('snumber', 20);
            $table->string('img', 300);
            $table->string('address', 50);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
