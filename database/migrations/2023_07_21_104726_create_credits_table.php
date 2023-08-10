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
        Schema::create('credits', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('id_client');
            $table->unsignedBigInteger('id_user');
            $table->integer('typec');
            $table->float('montant');
            $table->date('date');
            $table->integer('duree');
            $table->float('remboursement');
            $table->string('ref_bancaire');
            $table->integer('nb_chevaux')->nullable();
            $table->timestamps();

            // Define foreign keys
            $table->foreign('id_client')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credits');
    }
};
