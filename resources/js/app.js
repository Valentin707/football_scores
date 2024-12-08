import { createApp } from 'vue';
import Games from './components/Games.vue';
import './bootstrap';

import Toast, { POSITION } from "vue-toastification";
// Import the CSS or use your own!
import "vue-toastification/dist/index.css";

const toastOptions = {
    position: POSITION.TOP_RIGHT,
    timeout: 2000,
    closeOnClick: true,
    pauseOnHover: true,
}

const app = createApp({});
// Register the Games component globally
app.component('games', Games);

app.use(Toast, toastOptions);
// Mount the app to an element with the id of app
app.mount('#app');
