<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMappingGeneratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapping_generators', function (Blueprint $table) {
            $table->id();
            $table->integer('idBan'); // Pastikan tipe data unsigned
            $table->integer('idMotor'); // Pastikan tipe data unsigned
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('idBan')->references('idBan')->on('masterban')->onDelete('cascade');
            $table->foreign('idMotor')->references('idMotor')->on('mastermotor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mapping_generators');
    }
}