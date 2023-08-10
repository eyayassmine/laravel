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
            //
            $table->unsignedBigInteger('id_client')->nullable()->change();
            $table->unsignedBigInteger('id_user')->nullable()->change();
            $table->integer('typec')->nullable()->change();
            $table->float('montant')->nullable()->change();
            $table->date('date')->nullable()->change();
            $table->integer('duree')->nullable()->change();
            $table->float('remboursement')->nullable()->change();
            $table->string('ref_bancaire')->nullable()->change();
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
