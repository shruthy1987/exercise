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
        //
        Schema::create('person_subject', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->references('id')->on('person');
                
            $table->foreignId('subject_id')->references('id')->on('subject');
                  

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::drop('person_subject');
    }
};
