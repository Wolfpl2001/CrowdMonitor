<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // In the migration file:
    public function up()
    {
        Schema::table('evenements', function (Blueprint $table) {
            $table->string('EventNaam')->default('Default Event')->change();
        });
    }

    public function down()
    {
        Schema::table('evenements', function (Blueprint $table) {
            $table->string('EventNaam')->default(null)->change();
        });
    }
};
