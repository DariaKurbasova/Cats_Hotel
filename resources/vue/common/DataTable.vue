<template>
    <vue3-data-table :items="rows"
                     :headers="columns"
                     v-model:server-options="options"
                     :server-items-length="total"
                     :loading="loading"
                     @click-row="onRowClick"
                     rowsPerPageMessage="Отображать на странице:"
                     rowsOfPageSeparatorMessage="из">
        <template v-for="filter in filterOptions" #[getSlotName(filter.field)]="header">
            <div class="filter-column">
                {{ header.text }}
                <div v-if="filter.type === 'text'" class="filter-menu">
                    <input v-model="filterValues[filter.field]" @click.prevent.stop/>
                </div>
                <div v-if="filter.type === 'list'" class="filter-menu">
                    <select v-model="filterValues[filter.field]" @click.prevent.stop>
                        <option v-for="(option, label) in filter.options" :value="label">
                            {{ option }}
                        </option>
                    </select>
                </div>
            </div>
        </template>
    </vue3-data-table>
</template>

<script>
import axios from 'axios';
import Vue3EasyDataTable from 'vue3-easy-data-table';

export default {
    name: 'DataTable',
    components: {
        'vue3-data-table': Vue3EasyDataTable,
    },
    props: {
        url: {
            type: String,
            required: true,
        },
        columns: {
            type: Array,
            required: true,
        },
        filterOptions: {
            type: Array,
            default: [],
        },
        onRowClick: {
            type: Function,
            default: () => {},
        }
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
            filterValues: this.getFilterValues(),
        };
    },
    methods: {
        // ToDo Стили фильтров
        getData: function () {
            this.loading = true;
            axios.post(this.url, {
                page: this.options.page,
                per_page: this.options.rowsPerPage,
                sort_by: this.options.sortBy,
                sort_dir: this.options.sortType,
                filters: this.getCleanFilters(),
            }).then((response) => {
                this.rows = response.data.items;
                this.total = response.data.total;
                this.loading = false;
            }).catch((response) => {
                this.rows = [];
                this.total = 0;
                this.options.page = 1;
                this.loading = false;

                alert('Произошла ошибка!'); // ToDo Показывать красивое окошко с ошибкой
            })
        },
        getDefaultOptions: function () {
           return {
                page: 1,
                rowsPerPage: 5,
                sortBy: 'id',
                sortType: 'asc',
            };
        },
        getSlotName: function (filter) {
            return 'header-' + filter;
        },
        getFilterValues: function () {
            let result = {};

            this.filterOptions.forEach(option => {
                result[option.field] = '';
            });

            return result;
        },
        getCleanFilters: function () {
            return Object.fromEntries(Object.entries(this.filterValues).filter(([_, v]) => v));
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
        },
        filterValues: {
            handler() {
                this.getData();
            },
            deep: true
        }
    },
}
</script>
