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
        
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('Nom_complet_en_arabe');
            $table->enum('Sexe', ['Male', 'Female']);
            $table->string('État_civil')->nullable();
            $table->integer('Nombre_d_enfants')->nullable();
            $table->date('Date_de_naissance')->nullable();
            $table->string('Lieu_de_naissance')->nullable();
            $table->string('L_adresse')->nullable();
            $table->string('La_ville')->nullable();
            $table->string('CIN')->nullable();
            $table->string('Numéro_de_téléphone')->nullable();
            $table->string('Numéro_WhatsApp')->nullable();
            $table->string('Facebook')->nullable();
            $table->string('Email')->unique();
            $table->string('Password');
            $table->string('niveau_d_étude')->nullable();
            $table->string('Spécialisation')->nullable();
            $table->integer('Niveau_de_langue_arabe')->nullable();
            $table->integer('Niveau_de_langue_amazighe')->nullable();
            $table->integer('Niveau_de_langue_française')->nullable();
            $table->integer('NLA')->nullable();
            $table->integer('Niveau_de_langue_espagnole')->nullable();
            $table->string('Autres_langues')->nullable();
            $table->string('Situation_professionnelle')->nullable();
            $table->string('Spécialité_professionnelle')->nullable();
            $table->integer('Années_d_expérience')->nullable();
            $table->string('Region')->nullable();
            $table->date('date_d_adhésion_à_l_association')->nullable();
            $table->enum('membre_actif_Dans_l_association', ['Yes', 'No'])->default('Yes');
            $table->string('Responsabilité_au_sein_de_l_association')->nullable();
            $table->string('Formation_acquise')->nullable();
            $table->string('Prise_de_mesure_pour_les_vêtements')->nullable();
            $table->string('L_appartenance_politique')->nullable();
            $table->date('date_d_adhésion_à_parti')->nullable();
            $table->enum('Membre_actif_dans_le_parti', ['Yes', 'No'])->default('No');
            $table->string('La_fonction_au_sein_du_parti')->nullable();
            $table->unsignedBigInteger('association_id')->nullable();
            $table->unsignedBigInteger('filiere_id');
            $table->foreign('filiere_id')->references('id')->on('filieres')->onDelete('cascade');
            $table->unsignedBigInteger('region_id')->nullable();
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
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
        Schema::dropIfExists('members');
    }
};



    