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
        Schema::create('Evenementnow', function (Blueprint $table) {
            $table->increments('Id');  
            $table->unsignedInteger('EvenementId');  
            $table->foreign('EvenementId')->references('id')->on('evenement')->onDelete('cascade'); 
            $table->integer('Bezoekers'); 
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{Schema::dropIfExists('user');}
};
