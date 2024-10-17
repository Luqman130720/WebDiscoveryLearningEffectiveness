<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->string('guru_pembuat');
            $table->string('mata_pelajaran');
            $table->string('judul_tugas');
            $table->string('kelas');
            $table->date('tanggal_pengerjaan');
            $table->time('waktu_pengerjaan');

            // Bagian pengumpulan tugas
            $table->date('tanggal_pengumpulan');
            $table->time('waktu_pengumpulan');
            $table->string('link_file')->nullable();
            $table->string('unggah_soal');
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
        Schema::dropIfExists('assignments');
    }
}
