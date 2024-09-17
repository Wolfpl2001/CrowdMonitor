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
        Schema::create("evenement", function (Blueprint $table) {
            $table->Increments("id");
            $table->integer("MaxBezoekers");
            $table->dateTime("Start");
            $table->dateTime("Eind");
            $table->unsignedInteger("AdresID");
            $table->foreign('AdresID')->references('AdresID')->on('Adres');
            $table->string("EventNaam");
            $table->string('Stad');
            $table->unsignedInteger("UserID");
            $table->foreign('UserID')->references('UserID')->on('User');
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