<template>
    <div class="room">
        <h2 class="room-name">{{ room.name }}</h2>
        <button @click="selectRoom">Выбрать</button>
    </div>
</template>

<script>
export default {
    name: "Room",
    props: {
        room: {
            type: Object,
            required: true,
        }
    },
    emits: [
        'selected'
    ],
    methods: {
        selectRoom: function () {
            this.$emit('selected');
        }
    }
}
</script>
