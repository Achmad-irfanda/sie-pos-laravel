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
        Schema::create('CompanyUsers', function (Blueprint $table) {
            $table->id('CompanyUsersId');
            $table->unsignedBigInteger('CompanyId'); 
            $table->unsignedBigInteger('UserId');
            $table->enum('Role',['admin', 'kasir', 'kitchen']); 
            $table->unsignedBigInteger('CompanyBranchId')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_users');
    }
};
