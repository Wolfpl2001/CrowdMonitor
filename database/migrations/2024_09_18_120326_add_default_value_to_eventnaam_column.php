<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // In the migration file:
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('event_name')->default('Default Event')->change();
        });
    }

    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('event_name')->default(null)->change();
        });
    }
};
