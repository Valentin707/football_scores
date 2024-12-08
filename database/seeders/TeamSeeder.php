<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = [
            [
                'name' => 'Manchester United',
                'year_of_creation' => 1878,
                'stadium' => 'Old Trafford',
                'country' => 'England',
            ],
            [
                'name' => 'Chelsea',
                'year_of_creation' => 1905,
                'stadium' => 'Stamford Bridge',
                'country' => 'England',
            ],
            [
                'name' => 'Arsenal',
                'year_of_creation' => 1886,
                'stadium' => 'Emirates Stadium',
                'country' => 'England',
            ],
            [
                'name' => 'Liverpool',
                'year_of_creation' => 1892,
                'stadium' => 'Anfield',
                'country' => 'England',
            ],
            [
                'name' => 'Real Madrid',
                'year_of_creation' => 1902,
                'stadium' => 'Santiago Bernabéu',
                'country' => 'Spain',
            ],
            [
                'name' => 'Barcelona',
                'year_of_creation' => 1899,
                'stadium' => 'Camp Nou',
                'country' => 'Spain',
            ],
            [
                'name' => 'Atletico Madrid',
                'year_of_creation' => 1903,
                'stadium' => 'Wanda Metropolitano',
                'country' => 'Spain',
            ],
            [
                'name' => 'Sevilla',
                'year_of_creation' => 1890,
                'stadium' => 'Ramón Sánchez Pizjuán',
                'country' => 'Spain',
            ],
            [
                'name' => 'Bayern Munich',
                'year_of_creation' => 1900,
                'stadium' => 'Allianz Arena',
                'country' => 'Germany',
            ],
            [
                'name' => 'Dortmund',
                'year_of_creation' => 1909,
                'stadium' => 'Signal Iduna Park',
                'country' => 'Germany',
            ],
            [
                'name' => 'PSG',
                'year_of_creation' => 1970,
                'stadium' => 'Parc des Princes',
                'country' => 'France',
            ],
            [
                'name' => 'Lyon',
                'year_of_creation' => 1950,
                'stadium' => 'Groupama Stadium',
                'country' => 'France',
            ],
            [
                'name' => 'Juventus',
                'year_of_creation' => 1897,
                'stadium' => 'Allianz Stadium',
                'country' => 'Italy',
            ],
            [
                'name' => 'Inter Milan',
                'year_of_creation' => 1908,
                'stadium' => 'San Siro',
                'country' => 'Italy',
            ],
            [
                'name' => 'AC Milan',
                'year_of_creation' => 1899,
                'stadium' => 'San Siro',
                'country' => 'Italy',
            ],
            [
                'name' => 'Napoli',
                'year_of_creation' => 1926,
                'stadium' => 'Stadio Diego Armando Maradona',
                'country' => 'Italy',
            ],
            [
                'name' => 'Ajax',
                'year_of_creation' => 1900,
                'stadium' => 'Johan Cruyff Arena',
                'country' => 'Netherlands',
            ],
            [
                'name' => 'Benfica',
                'year_of_creation' => 1904,
                'stadium' => 'Estádio da Luz',
                'country' => 'Portugal',
            ],
            [
                'name' => 'Porto',
                'year_of_creation' => 1893,
                'stadium' => 'Estádio do Dragão',
                'country' => 'Portugal',
            ],
            [
                'name' => 'Celtic',
                'year_of_creation' => 1887,
                'stadium' => 'Celtic Park',
                'country' => 'Scotland',
            ],
        ];

        foreach ($teams as $team) {
            Team::create([
                'name' => $team['name'],
                'year_of_creation' => $team['year_of_creation'],
                'stadium' => $team['stadium'],
                'country' => $team['country'],
            ]);
        }
    }
}
