<?php

namespace Database\Seeders;

use App\Models\Season;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seasons = Season::all();
        $teams = Team::all();

        foreach ($seasons as $season) {
            // make 5 random games for each season
            for ($i = 0; $i < 5; $i++) {
                $teamA = $teams->random();
                $teamB = $teams->random();

                // if duplicate teams, get another random team
                while ($teamA->id === $teamB->id) {
                    $teamB = $teams->random();
                }

                $startDatetime = now()
                    ->subDays(5)
                    ->addDays(rand(0, 10))
                    ->setTime(rand(0, 23), rand(0, 59), rand(0, 59));
                $teamAScore = $startDatetime->isFuture() ? 0 : rand(0, 5);
                $teamBScore = $startDatetime->isFuture() ? 0 : rand(0, 5);

                $season->games()->create([
                    'home_team_id' => $teamA->id,
                    'away_team_id' => $teamB->id,
                    'home_team_score' => $teamAScore,
                    'away_team_score' => $teamBScore,
                    'played_at' => $startDatetime,
                ]);
            }
        }
    }
}
