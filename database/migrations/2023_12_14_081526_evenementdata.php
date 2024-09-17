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
        Schema::create("Evenementdata", function (Blueprint $table) {
            $table->Increments("EvenementdataID");
            $table->unsignedInteger("EvenementID");
            $table->foreign('EvenementID')->references('id')->on('Evenement');
            $table->integer("Instroom");
            $table->integer("Uitstroom");
            $table->float("temperature");
            $table->string("weather_description");
            $table->integer("Weer");
            $table->timestamp("Tijd");
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
