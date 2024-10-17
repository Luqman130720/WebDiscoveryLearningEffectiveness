<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikertScalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likert_scales', function (Blueprint $table) {
            $table->id();
            $table->string('nisn', 20);
            $table->string('name', 100);
            $table->string('class', 20);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->foreignId('question_id')->constrained('questions')->onDelete('cascade'); // Menyimpan ID pertanyaan
            $table->json('scale'); // Menyimpan nilai skala dalam format JSON
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
        Schema::dropIfExists('likert_scales');
    }
}
