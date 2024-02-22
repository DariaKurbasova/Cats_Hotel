import './bootstrap';
import {createApp} from 'vue';
import SellingAnalytics from "../vue/SellingAnalytics.vue";
import RoomsList from "../vue/booking/RoomsList.vue";
import Room from "../vue/booking/Room.vue";

const app = createApp({});

app.component('selling-analytics', SellingAnalytics)

app.component('rooms-list', RoomsList)
app.component('room', Room)

app.mount('#bakeryApp')
