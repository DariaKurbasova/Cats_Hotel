<template>
    <vue3-data-table :items="rows"
                     :headers="columns"
                     v-model:server-options="options"
                     :server-items-length="10"
                     :loading="loading"
                     rowsPerPageMessage="Отображать на странице:"
                     rowsOfPageSeparatorMessage="из"/>
</template>

<script>
import axios from 'axios';
import Vue3EasyDataTable from 'vue3-easy-data-table';

export default {
    name: "DataTable",
    components: {
        'vue3-data-table': Vue3EasyDataTable,
    },
    props: {
        url: {
            type: String,
            required: true,
        },
        columns: {
            required: true,
            type: Array,
        },
    },
    data: function () {
        return {
            rows: [],
            total: 0,
            page: 1,
            options: {
                page: 1,
                rowsPerPage: 5,
                sortBy: 'id',
                sortType: 'asc',
            },
            loading: false,
        };
    },
    methods: {
        getData: function () {
            this.loading = true;
            axios.post(this.url, {
                page: this.options.page,
                per_page: this.options.rowsPerPage,
                sort_by: this.options.sortBy,
                sort_dir: this.options.sortType,
            }).then((response) => {
                this.rows = response.data.items;
                this.total = response.data.total;
                this.loading = false;
            })
        },
        getDefaultOptions: function () {
           return {
                page: 1,
                rowsPerPage: 5,
                sortBy: 'id',
                sortType: 'asc',
            };
        }
    },
    mounted() {
        this.getData();
    },
    watch: {
        options(newVal, oldVal) {
            let result = newVal;

            if (!newVal.sortBy || !newVal.sortType) {
                result = this.getDefaultOptions();
            }
            if ((newVal.sortBy !== oldVal.sortBy || newVal.sortType !== oldVal.sortType) && newVal.page > 1) {
                result.page = 1;
            }

            this.options = result;

            this.getData();
        }
    },
}
</script>
