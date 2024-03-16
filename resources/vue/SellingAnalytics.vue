<template>
    <div>{{ test ?? '' }}</div>
</template>

<script>
export default {
    // ToDo Удалить тестовый файл
    name: "SellingAnalytics",
    props: {
        test: {
            type: String,
            required: false,
        }
    },
}
</script>
