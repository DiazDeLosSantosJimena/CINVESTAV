<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('project_id')->constrained('projects');
            $table->integer('title');
            $table->integer('extension');
            $table->integer('key_words');
            $table->integer('abstract_keywords');
            $table->integer('problematic');
            $table->integer('theoretical');
            $table->integer('methodology');
            $table->integer('proposal');
            $table->integer('results');
            $table->integer('APA_table');
            $table->integer('APA_references');
            $table->integer('format'); //Fuente,Margen y Extensión
            $table->string('status');
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('evaluations');
    }
};
