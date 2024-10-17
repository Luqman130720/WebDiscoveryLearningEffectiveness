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
           $table->id();
            $table->string('guru_pembuat');
            $table->string('mata_pelajaran');
            $table->string('judul_kuis');
            $table->foreignId('kelas_id')->constrained('classrooms');
            $table->date('tanggal_pengerjaan');
            $table->time('waktu_pengerjaan');
            $table->string('link_kuis');
            $table->text('deskripsi')->nullable();
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
        Schema::dropIfExists('quizzes');
    }
}
