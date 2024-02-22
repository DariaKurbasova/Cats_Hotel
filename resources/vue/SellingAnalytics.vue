<template>
    <div>{{ test ?? '' }}</div>
</template>

<script>
export default {
    name: "SellingAnalytics",
    props: {
        test: {
            type: String,
            required: false,
        }
    },
}
</script>
