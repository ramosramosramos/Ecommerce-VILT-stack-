<template>

    <Head :title="name" />
    <div class=" w-[80%] m-auto h-[50px] flex items-center
    text-2xl text-gray-400">
        <strong class="">{{ name }}</strong>
    </div>
</template>
<script setup>
defineProps({
    name: {
        type: String,
        default: "Page Name",
    },
})

</script>
