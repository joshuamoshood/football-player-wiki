<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\FootballClub;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FootballClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonString = file_get_contents(__DIR__ .'/seeds/football-clubs.json');
        $clubs = json_decode($jsonString);
        $countriesLookup = Country::pluck("id", "name");
        foreach ($clubs as $club) {
            if(isset($countriesLookup[$club->country])){
                FootballClub::firstOrCreate([
                    'name' => $club->name
                ], [
                    'country_id' => $countriesLookup[$club->country]
                ]);
            }
        }
    }
}
