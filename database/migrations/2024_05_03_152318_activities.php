<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('La_branche');
            $table->string('Entité');
            $table->string('Le_siège_central');
            $table->string('type_d_activité');
            $table->date('date_d_activity');
            $table->string('Nature_de_l_activité');
            $table->string('Domaine_de_l_activité');
            $table->integer('Nombre_de_bénéficiaires_masculins');
            $table->integer('Nombre_de_bénéficiaires_féminins');
            $table->string('La_population_cible');
            $table->string('Lieu_de_l_activité');
            $table->string('Durée_de_l_activité');
            $table->string('Rapport_d_activité')->nullable();
            $table->string('Les_membres_du_personnel_impliqués_dans_l_activité')->nullable();
            $table->decimal('Les_frais_de_l_activité', 10, 2);
            $table->decimal('Les_Revenus_de_l_activité', 10, 2);
            $table->string('location');
            $table->unsignedBigInteger('association_id');
            $table->unsignedBigInteger('fillier');
            $table->foreign('fillier')->references('id')->on('filieres')->onDelete('cascade');
            $table->foreign('association_id')->references('id')->on('scout_associations')->onDelete('cascade');
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
        //
        Schema::dropIfExists('activities');
    }
};

