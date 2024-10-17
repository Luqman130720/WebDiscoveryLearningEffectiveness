<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
          $table->id(); 
            $table->string('nip', 20)->unique(); 
            $table->string('username', 50)->unique(); 
            $table->string('nama', 100);
            $table->string('email')->nullable(); 
            $table->enum('jenis_kelamin', ['L', 'P']); 
            $table->string('tempat_lahir', 100); 
            $table->date('tanggal_lahir'); 
            $table->text('alamat'); 
            $table->string('password', 60);
            $table->string('agama', 50); 
            $table->string('foto_profil')->nullable();
            $table->string('role')->default('teacher');
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
        Schema::dropIfExists('teachers');
    }
}
