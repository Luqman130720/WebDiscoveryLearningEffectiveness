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
            $table->string('nisn', 20)->unique();
            $table->string('nis_sekolah', 20)->unique(); 
            $table->string('nama', 100);
             $table->string('username', 50)->unique(); 
            $table->string('email')->nullable();
            $table->string('kelas', 20); 
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir', 100); 
            $table->date('tanggal_lahir'); 
            $table->text('alamat'); 
            $table->string('password'); 
            $table->string('agama', 50); 
            $table->string('foto_profil')->nullable(); 
            $table->string('role')->default('student');
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
        Schema::dropIfExists('students');
    }
}
