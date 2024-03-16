import './bootstrap';
import {createApp} from 'vue';

import SellingAnalytics from "../vue/SellingAnalytics.vue";
import RoomsList from "../vue/booking/RoomsList.vue";

import AdminRoomsList from "../vue/admin/rooms/List.vue";

import 'vue3-easy-data-table/dist/style.css';

const app = createApp({});

app.component('selling-analytics', SellingAnalytics)

app.component('rooms-list', RoomsList)

app.component('admin-rooms', AdminRoomsList);

app.mount('#bakeryApp')
