<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TournamentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'games' => GameResource::collection($this->getGames()),
        ];
    }

    /**
     * Get all games for the tournament from related seasons.
     */
    private function getGames()
    {
        // Collect all games from related seasons
        return $this->seasons->flatMap->games;
    }
}
