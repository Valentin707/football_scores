<?php

namespace App\Http\Controllers;

use App\Http\Resources\TournamentResource;
use App\Models\Tournament;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function index()
    {
        $byDate = request()->input('date') ? Carbon::parse(request()->input('date')) : Carbon::today();

        $tournaments = Tournament::whereHas('seasons.games', function ($query) use ($byDate) {
            $query->whereDate('played_at', $byDate);
        })->with([
            'seasons.games' => function ($query) use ($byDate) {
                $query->whereDate('played_at', $byDate)
                    ->orderBy('played_at', 'asc');
            }
        ])->get();

        return response()->json(TournamentResource::collection($tournaments));
    }
}
