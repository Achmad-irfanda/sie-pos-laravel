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
        Schema::create('Companies', function (Blueprint $table) {
            $table->id('CompanyId');
            $table->string('CompanyName'); 
            $table->string('CompanyAddress'); 
            $table->string('CompanyPhone'); 
            $table->unsignedBigInteger('UserId')->nullable(); 
            $table->timestamps();

            $table->foreign('UserId')
            ->on('Users')
            -> references('id')
            -> nullOnDelete();
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Companies');
    }
};
