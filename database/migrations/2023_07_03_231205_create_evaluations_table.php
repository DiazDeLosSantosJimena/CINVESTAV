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
            $table->foreignId('user_id')->constrained('users'); // Evaluador
            $table->foreignId('project_user')->constrained('projects_users'); //Proyecto que le pertenece a un ponente
            $table->integer('title')->nullable();
            $table->integer('extension')->nullable();
            $table->integer('key_words')->nullable();
            $table->integer('abstract_keywords')->nullable();
            $table->integer('problematic')->nullable();
            $table->integer('theoretical')->nullable();
            $table->integer('methodology')->nullable();
            $table->integer('proposal')->nullable();
            $table->integer('results')->nullable();
            $table->integer('APA_table')->nullable();
            $table->integer('APA_references')->nullable();
            $table->integer('format')->nullable(); //Fuente, Margen y Extensión
            $table->string('status')->nullable();
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
