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
        Schema::create("events", function (Blueprint $table) {
            $table->id();
            $table->string("event_name");
            $table->integer("max_visitors");
            $table->dateTime("start");
            $table->dateTime("end");
            $table->string("street");
            $table->integer("house_number");
            $table->string("postal_code");
            $table->string('city');
            $table->string('country_code');
            $table->foreignIdFor(User::class);
            $table->foreign('user_id')->references('id')->on('users');
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
