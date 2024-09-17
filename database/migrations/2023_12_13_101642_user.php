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
        Schema::create("user", function (Blueprint $table) {
            $table->Increments("UserID");
            $table->unsignedInteger("LoginID");
            $table->foreign('LoginID')->references('LoginID')->on('Login');
            $table->string("BedrijfsNaam");
            $table->string("TelefoonNummer");
            $table->integer("Usertype");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{Schema::dropIfExists('user');}
};