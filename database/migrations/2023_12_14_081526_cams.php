<?php

use App\Models\Event;
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
        Schema::create("cams", function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Event::class);
            $table->foreign('event_id')->references('id')->on('events');
            $table->integer("inflow");
            $table->integer("outflow");
            $table->float("temperature");
            $table->integer("weather_code");
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
