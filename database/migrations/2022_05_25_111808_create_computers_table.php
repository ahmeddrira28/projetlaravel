<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->id();
            $table->string('Reference');
            $table->string('Ecran');
            $table->string('Processeur');
            $table->string('Ram');
            $table->string('Disque');
            $table->string('CarteGraphique');
            $table->string('prix');
            $table->string('imagecompetitf');
            $table->string('imagecomgrandf');
            $table->unsignedBigInteger('typeID');
            $table->foreign('typeID')
            ->references('id')
            ->on('types')
            ->onDelete('restrict')
            ->onUpdate('restrict');
            $table->unsignedBigInteger('marqueID');
            $table->foreign('marqueID')
            ->references('id')
            ->on('marques')
            ->onDelete('restrict')
            ->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('computers');
    }
}
