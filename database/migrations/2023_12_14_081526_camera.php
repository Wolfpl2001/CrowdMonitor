<?php

use App\Models\Evenement;
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
        Schema::create("Camera", function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Evenement::class);
            $table->foreign('evenement_id')->references('id')->on('evenement');
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
