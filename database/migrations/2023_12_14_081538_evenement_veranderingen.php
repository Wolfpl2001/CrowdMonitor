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
        Schema::create("Evenement_veranderingen", function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Evenement::class);
            $table->foreign('evenement_id')->references('id')->on('evenement');
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
