<template>
    <div class="rooms-list">
        <data-table url="/admin/rooms/list"
                    :columns="columns"
                    ref="table"
                    class="pointer"
                    :filter-options="filterOptions"
                    :on-row-click="openRoomModal"
        />
    </div>
</template>

<script>
import DataTable from '../../common/DataTable.vue'

export default {
    name: 'AdminRoomsList',
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
        openRoomModal(row, e) {
            const tr = e.target.closest('tr');
            tr.classList.add('loading');

            // ToDo Открытие диалогового окна и запрос на получение данных

            tr.classList.remove('loading');
        },
    },
}
</script>
