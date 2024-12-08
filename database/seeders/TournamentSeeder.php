<?php

namespace Database\Seeders;

use App\Models\Tournament;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TournamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tournaments = ['Premier League', 'Champions League', 'Europa League'];

        foreach ($tournaments as $tournament) {
            $newTournament = Tournament::create([
                'name' => $tournament,
            ]);

            $newTournament->seasons()->create(['year' => '2024']);
        }
    }
}
