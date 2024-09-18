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
        Schema::create('user', function (Blueprint $table) {
            $table->increments('UserID');
            $table->string("Username");
            $table->string("Password");
            $table->string('BedrijfsNaam');
            $table->string('TelefoonNummer');
            $table->integer('Usertype');
            $table->foreignIdFor(Evenement::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{Schema::dropIfExists('user');}
};
