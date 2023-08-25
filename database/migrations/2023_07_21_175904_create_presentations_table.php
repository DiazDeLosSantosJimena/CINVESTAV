<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('presentations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('pro_users')->constrained('projects_users');
            $table->date('date');
            $table->time('hour');
            $table->string('site');
            $table->string('assistance');
            $table->integer('participants');
            $table->integer('part');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presentations');
    }
};
