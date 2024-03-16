<template>
    <div class="rooms-list">
        <data-table url="/admin/rooms/list" :columns="columns" ref="table"/>
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
        };
    },
    methods: {

    },
}
</script>
