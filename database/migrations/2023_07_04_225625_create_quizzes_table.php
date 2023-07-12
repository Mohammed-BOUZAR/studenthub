<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->integer('id');
            $table->string('department', 50);
            $table->string('session', 20);
            $table->string('semester', 20);
            $table->string('subject', 20);
            $table->date('quizdate');
            $table->string('quiztitle', 20);
            $table->string('questions', 500);
            $table->string('op1', 200);
            $table->string('op2', 200);
            $table->string('op3', 200);
            $table->string('op4', 200);
            $table->string('rightans', 20);
            $table->integer('quiztime');
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
        Schema::dropIfExists('quizzes');
    }
}
