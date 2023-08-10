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
        Schema::table('credits', function (Blueprint $table) {
            $table->string('nb_chevaux')->nullable()->change();
            $table->decimal('montant', 21, 3)->change()->nullable();
            $table->decimal('remboursement', 21, 3)->change()->nullable();

            
        });
    }

    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('credits', function (Blueprint $table) {
            //
        });
    }
};
