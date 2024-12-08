<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'home_team' => new TeamResource($this->homeTeam),
            'away_team' => new TeamResource($this->awayTeam),
            'home_team_score' => $this->home_team_score,
            'away_team_score' => $this->away_team_score,
            'played_at' => $this->played_at->format('H:i'),
        ];
    }
}
