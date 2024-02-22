import './bootstrap';
import {createApp} from 'vue';
import SellingAnalytics from "../vue/SellingAnalytics.vue";
import RoomsList from "../vue/booking/RoomsList.vue";
import Room from "../vue/booking/Room.vue";

import AdminRoomsList from "../vue/admin/rooms/List.vue";

import Vue3EasyDataTable from 'vue3-easy-data-table';
import 'vue3-easy-data-table/dist/style.css';

const app = createApp({});

app.component('selling-analytics', SellingAnalytics)

app.component('rooms-list', RoomsList)
app.component('room', Room)

app.component('admin-rooms', AdminRoomsList);

app.component('data-table', Vue3EasyDataTable);

app.mount('#bakeryApp')
