<template>
    <div class="rooms-list">
        <div v-for="room in rooms">
            <Room :room="room" @selected="selectRoom(room)"/>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Room from "./Room.vue";

export default {
    name: "RoomsList",
    components: {
        Room,
    },
    props: {
        rooms: {
            type: Array,
            required: true,
        }
    },
    methods: {
        selectRoom: function (room) {
            axios.post('/booking/selectRoom/' + room.id).then((response) => {
                alert('Гц с бронью ' + room.name + '!');
            })
        },
    }
}
</script>
