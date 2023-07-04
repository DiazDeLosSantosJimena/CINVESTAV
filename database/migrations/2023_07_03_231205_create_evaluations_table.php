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
            $table->int('title');
            $table->int('extension');
            $table->int('key_words');
            $table->int('abstract_keywords');
            $table->int('problematic');
            $table->int('theoretical');
            $table->int('methodology');
            $table->int('proposal');
            $table->int('results');
            $table->int('APA_table');
            $table->int('APA_references');
            $table->int('format'); //Fuente,Margen y Extensión
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
