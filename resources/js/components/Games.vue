<template>
    <div class="games-container">
        <div class="games-filters-container">
            <input class="games-filter" type="date" name="date" id="date" v-model="filterDate" @change="handleFilterByDate">
        </div>

        <game-list v-for="(league, index) in series" :key="index" :league="league"></game-list>

        <div class="series-wrapper" v-if="this.series.length === 0">
            <div class="game-series">
                <h2>No Games Found!</h2>
            </div>
        </div>
    </div>
</template>
<script>
import GameList from "./GameList.vue";
import { useToast } from "vue-toastification";
export default {
    name: 'GamesView',
    components: {
        GameList
    },
    data() {
        return {
            series: [],
            refreshInterval: null,
            filterDate: ''
        }
    },
    methods: {
        fetchGames() {
            axios.get('/get-games', {
                params: {
                    date: this.filterDate
                }
            }).then(response => {
                this.series = response.data
            }).catch(() => {
                const toast = useToast();
                toast.error("Something went wrong with retrieving the game data!");
            })
        },
        setRefreshInterval() {
            this.refreshInterval = setInterval(() => {
                this.fetchGames()
            }, 60000)
        },
        handleFilterByDate() {
            clearInterval(this.refreshInterval)
            this.fetchGames()
            this.setRefreshInterval()
        }
    },
    mounted() {
        // set today's date by default
        this.filterDate = new Date().toISOString().split('T')[0]
        this.fetchGames()
        this.setRefreshInterval()
    },
    beforeUnmount() {
        clearInterval(this.refreshInterval)
    }
}
</script>
