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
        Schema::create("Evenementveranderingen", function (Blueprint $table) {
            $table->Increments("Id");
            $table->unsignedInteger("EvenementID");
            $table->foreign('EvenementID')->references('id')->on('Evenement');
            $table->longText("Notitie");
            $table->time("Tijd");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
