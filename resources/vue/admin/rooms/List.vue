<template>
    <div class="rooms-list">
        <data-table :items="[]" :headers="[]"/>
    </div>
</template>

<script>
import axios from 'axios';
import Vue3EasyDataTable from 'vue3-easy-data-table';

export default {
    name: "AdminRoomsList",
    components: {
        'data-table': Vue3EasyDataTable,
    },
    props: {
        rooms: {
            type: Array,
            required: true,
        }
    },
    methods: {

    }
}
</script>
