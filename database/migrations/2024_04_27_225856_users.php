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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 255);
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            
            $table->timestamps();
        });


       // Tableau des régions et des adresses e-mail
        $regions = [
            'Tanger-Tétouan-Al Hoceïma',
            'Oriental',
            'Fès-Meknès',
            'Rabat-Salé-Kénitra',
            'Béni Mellal-Khénifra',
            'Casablanca-Settat',
            'Marrakech-Safi',
            'Drâa-Tafilalet',
            'Souss-Massa',
            'Guelmim-Oued Noun',
            'Laâyoune-Sakia El Hamra',
            'Dakhla-Oued Ed-Dahab'
        ];

        foreach ($regions as $index => $region) {
            $email = 'adminregion' . ($index + 1) . '@mail.com';
            $password = Hash::make('regionregion');

            // Insérer les données dans la table users
            DB::table('users')->insert([
                'nom' => $region,
                'email' => $email,
                'password' => $password,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        DB::table('users')->insert([
            'nom' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('adminadmin'),
            'created_at' => now(),
            'updated_at' => now()
        ]);



        $filieres = [
            ['TT_TH_AH_CS', 'Centre-ville', 1],
            ['TT_TH_AH_CM', 'Charf-Mghogha', 1],
            ['TT_TH_AH_MO', 'M\'diq-Oued Laou', 1],

            ['OR_BD_CA', 'Berkane-Chefchaouen', 2],
            ['OR_EF_CN', 'El Hajeb-Figuig', 2],
            ['OR_JE_GR', 'Jerada-Guelmim', 2],

            ['FM_EF_CN', 'El Hajeb-Figuig', 3],
            ['FM_IF_AA', 'Ifrane-Azilal', 3],
            ['FM_MK_FS', 'Meknès-Fès', 3],

            ['RS_BN_BM', 'Ben Slimane-Boulemane', 4],
            ['RS_KR_KS', 'Khémisset-Kénitra', 4],
            ['RS_RK_Sl', 'Rabat-Salé', 4],

            ['BM_BE_LK', 'Béni Mellal-Khénifra', 5],
            ['BM_ZK_TN', 'Azilal-Khenifra', 5],
            ['BM_FE_BE', 'Fquih Ben Salah', 5],

            ['CS_CA_RA', 'Casablanca-Settat', 6],
            ['CS_BA_CS', 'Berrechid-Settat', 6],
            ['CS_NK_MO', 'Nouaceur-Mohammédia', 6],

            ['MS_AL_HA', 'Al Haouz', 7],
            ['MS_MK_ER', 'Marrakech-Essaouira', 7],
            ['MS_RM_NC', 'Rehamna-Marrakech', 7],

            ['DT_ER_OD', 'Errachidia-Ouarzazate', 8],
            ['DT_SK_TN', 'Sefrou-Khenifra', 8],
            ['DT_ZG_ZK', 'Zagora-Zagora', 8],

            ['SM_AS_TT', 'Agadir Ida-Outanane-Taroudant', 9],
            ['SM_GF_TR', 'Guelmim-Oued Noun-Tiznit', 9],
            ['SM_TS_TT', 'Tata-Taroudant', 9],

            ['GN_CH_GN', 'Chtouka-Aït Baha-Guelmim', 10],
            ['GN_GL_NS', 'Guelmim-Layoune-Sakia El Hamra', 10],
            ['GN_TP_GL', 'Tan-Tan-Plage-Layoune', 10],

            ['LS_EJ_SL', 'Es Semara-Jdir-Laa', 11],
            ['LS_SM_ES', 'Smara', 11],
            ['LS_WS_LK', 'Laâyoune-Boujdour-Sakia El Hamra', 11],

            ['DO_OT_OU', 'Oued Ed-Dahab-Lagouira-Tarfaya', 12],
            ['DO_SM_DM', 'Smara-Dakhla', 12],
            ['DO_TM_MK', 'Tantan', 12],
        ];

        foreach ($filieres as $index => $filiere) {
            $email = 'adminfiliere' . ($index + 1) . '@mail.com';
            $password = Hash::make('filierefiliere'); 

            // Insérer les données dans la table users
            DB::table('users')->insert([
                'nom' => $filiere[0],
                'email' => $email,
                'password' => $password,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

       
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('users');
    }
};
