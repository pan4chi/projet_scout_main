<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MemberScouts; // Import the MemberScouts model
use App\Models\ScoutAssociation; // Import the ScoutAssociation model
use Faker\Factory as Faker;

class MemberScoutsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ar_MA');

        // Get all scout associations
        $scoutAssociations = ScoutAssociation::all();

        for ($i = 0; $i < 100; $i++) {
            // Get a random scout association
            $scoutAssociation = $scoutAssociations->random();

            MemberScouts::create([
                'Nom complet en arabe' => $faker->name,
                'Sexe' => $faker->randomElement(['Male', 'Female']),
                'État civil' => $faker->randomElement(['Married', 'Single', 'Divorced', 'Widowed']),
                "Nombre d'enfants" => $faker->numberBetween(0, 5),
                'Date de naissance' => $faker->date('Y-m-d'),
                'Lieu de naissance' => $faker->city,
                'L\'adresse' => $faker->address,
                'La ville' => $faker->city,
                'CIN' => $faker->numerify('########'),
                'Numéro de téléphone' => $faker->numerify('06########'),
                'Numéro WhatsApp' => $faker->numerify('06########'),
                'Facebook' => $faker->userName,
                'Email' => $faker->email,
                'Password' => bcrypt('password'),
                'niveau d\'étude' => $faker->randomElement(['Primary', 'Secondary', 'University', 'Master', 'PhD']),
                'Spécialisation' => $faker->jobTitle,
                'Niveau de langue arabe' => $faker->numberBetween(1, 5),
                'Niveau de langue amazighe' => $faker->numberBetween(1, 5),
                'Niveau de langue française' => $faker->numberBetween(1, 5),
                'niveau de langue anglais' => $faker->numberBetween(1, 5),
                'Niveau de langue espagnole' => $faker->numberBetween(1, 5),
                'Autres langues' => $faker->randomElement(['German', 'Italian', 'Chinese', 'Russian']),
                'Situation professionnelle' => $faker->randomElement(['Employed', 'Unemployed', 'Student', 'Retired']),
                'Spécialité professionnelle' => $faker->jobTitle,
                'Années d\'expérience' => $faker->numberBetween(0, 20),
                'Region' => $faker->randomElement(['Rabat-Salé-Kénitra', 'Casablanca-Settat', 'Tanger-Tétouan-Al Hoceïma', 'Fès-Meknès', 'Marrakech-Safi', 'Béni Mellal-Khénifra', 'Drâa-Tafilalet', 'Souss-Massa', 'Guelmim-Oued Noun', 'Laâyoune-Sakia El Hamra', 'Dakhla-Oued Ed Dahab']),
                "date d'adhésion à l'association" => $faker->date('Y-m-d'),
                "membre actif Dans l'association" => $faker->randomElement(['Yes', 'No']),
                'Responsabilité au sein de l\'association' => $faker->jobTitle,
                'Formation acquise' => $faker->randomElement(['First aid', 'CPR', 'Lifeguarding', 'Wilderness survival']),
                'filiere_id' => $faker->randomElement(['Sciences', 'Lettres', 'Sciences économiques et sociales', 'Sciences juridiques', 'Sciences politiques']), // Add the fillier value
                'Prise de mesure pour les vêtements' => $faker->randomElement(['Yes', 'No']),
                'L\'appartenance politique' => $faker->randomElement(['Istiqlal', 'PAM', 'PJD', 'USFP', 'PPS']),
                'date d\'adhésion à parti' => $faker->date('Y-m-d'),
                'Membre actif dans le parti' => $faker->randomElement(['Yes', 'No']),
                'La fonction au sein du parti' => $faker->jobTitle,
                // Make sure that the association_id value exists in the scout_associations table
                'association_id' => $scoutAssociation->id,
            ]);
        }
    }
}
