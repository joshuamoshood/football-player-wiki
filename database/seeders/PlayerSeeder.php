<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\Country;
use App\Models\FootballClub;
use App\Models\PlayerStat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonString = file_get_contents(__DIR__ .'/seeds/players.json');
        $players = json_decode($jsonString);
        $countriesLookup = Country::pluck("id", "name");
        $footballLookup = FootballClub::pluck("id", "name");
        foreach ($players as $player) {
            $playerModel = Player::firstOrCreate([
                'name' => $player->player_name
            ], [
                'age' => $player->age,
                'country_id' => $countriesLookup[$player->country],
                'football_club_id' => $footballLookup[$player->club]
            ]);

            PlayerStat::updateOrCreate([
                'player_id' => $playerModel->id
            ],[
                'appearances' => $player->appearances,
                'goals' => $player->goals,
                'assists' => $player->assists,
                'yellow_cards' => $player->yellow_cards,
                'red_cards' => $player->red_cards
            ]);
        }
    }
}
