<template>
    <div class="rooms-list">
        <data-table url="/admin/rooms/list" :columns="columns" ref="table" :filter-options="filterOptions"/>
    </div>
</template>

<script>
import DataTable from "../../common/DataTable.vue"

export default {
    name: "AdminRoomsList",
    components: {
        'data-table': DataTable,
    },
    data: function () {
        return {
            columns: [
                {value: 'name', text: 'Название', sortable: true},
                {value: 'size', text: 'Тип', sortable: true},
                {value: 'description', text: 'Описание', sortable: true},
                {value: 'is_valid', text: 'Свободен', sortable: true},
            ],
            filterOptions: [
                {
                    field: 'name',
                    type: 'text',
                },
                {
                    field: 'size',
                    type: 'list',
                    options: {
                        '': '',
                        S: 'S',
                        M: 'M',
                        L: 'L',
                        XL: 'XL',
                    },
                },
                {
                    field: 'description',
                    type: 'text',
                },
                {
                    field: 'is_valid',
                    type: 'list',
                    options: {
                        '': '',
                        0: 'Нет',
                        1: 'Да',
                    },
                },
            ],
        };
    },
    methods: {

    },
}
</script>
