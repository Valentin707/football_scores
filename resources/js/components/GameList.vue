<template>
    <div class="series-wrapper">
        <div class="game-series">
            <h2>{{ league.name }}</h2>
        </div>
        <div class="games-list" v-for="(game, index) in league.games" :key="'game'+index">
            <div class="game-item">
                <div class="game-time">
                    <span>{{ game.played_at }}</span>
                </div>
                <div class="game-teams">
                    <span class="team draw">{{ game.home_team.name }}</span>
                    <span class="result">{{ game.home_team_score }}:{{ game.away_team_score }}</span>
                    <span class="team">{{ game.away_team.name }}</span>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "GameList",
    props: ['league']
}
</script>
