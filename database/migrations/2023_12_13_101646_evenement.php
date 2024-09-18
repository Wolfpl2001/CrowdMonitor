<?php

use App\Models\User;
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
            $table->id();
            $table->string("EventNaam");
            $table->integer("MaxBezoekers");
            $table->dateTime("Start");
            $table->dateTime("Eind");
            $table->string('Stad');
            $table->string("Straat");
            $table->integer("Huisnummer");
            $table->string("Postcode");
            $table->foreignIdFor(User::class);
            $table->foreign('user_id')->references('id')->on('user');
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
