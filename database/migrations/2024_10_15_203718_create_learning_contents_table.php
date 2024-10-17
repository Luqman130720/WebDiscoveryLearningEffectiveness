<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learning_contents', function (Blueprint $table) {
            $table->id();
            $table->string('judul_konten');
            $table->string('pengarang');
            $table->string('penerbit');
            $table->text('deskripsi');
            $table->string('cover');
            $table->string('file_konten');
            $table->foreignId('kelas')->constrained('classrooms'); // Ini merujuk ke tabel classrooms
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
        Schema::dropIfExists('learning_contents');
    }
}
