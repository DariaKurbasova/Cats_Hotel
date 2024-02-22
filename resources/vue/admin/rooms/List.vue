<template>
    <div class="rooms-list">
        <data-table :items="rooms"
                    :headers="headers"
                    ref="table"
                    rowsPerPageMessage="Отображать на странице:"
                    rowsOfPageSeparatorMessage="из"/>
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
    data: function () {
        return {
            rooms: [],
            headers: [
                {value: 'name', text: 'Название'},
                {value: 'size', text: 'Тип'},
                {value: 'description', text: 'Описание'},
                {value: 'is_valid', text: 'Свободен'},
            ],
            total: 0,
            page: 1,
        };
    },
    methods: {
        getRooms: function () {
            // ToDo Настроить serverOptions и поведение таблицы

            // ToDo Вынести работу с datatable в отдельный компонент
            axios.post('/admin/rooms/list', {
                page: this.$refs.table.currentPaginationNumber,
                per_page: this.$refs.table.rowsPerPageActiveOption,
            }).then((response) => {
                this.rooms = response.data.items;
                this.total = response.data.total;
                this.$refs.table.clientItemsLength = response.data.total;
            })
        },
    },
    mounted() {
        this.getRooms();
    }
}
</script>
