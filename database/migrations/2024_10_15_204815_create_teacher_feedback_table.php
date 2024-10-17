<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_feedback', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mata_pelajaran')->constrained('subjects'); 
            $table->foreignId('kelas_id')->constrained('classrooms');
            $table->string('judul_feedback');
            $table->date('tanggal');
            $table->time('waktu');
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
        Schema::dropIfExists('teacher_feedback');
    }
}
