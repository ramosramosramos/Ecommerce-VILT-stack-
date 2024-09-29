<template>
    <div class="mb-3 w-[100%]">
        <label>{{ label }}</label>
        <input v-model="model" :type="type" :placeholder="placeholder"
        class="w-[100%]">
        <p class="text-red-500">{{ error }}</p>
    </div>
</template>
<script setup>

defineProps({
    type: {
        type: String,
        default: "text",
    },
    placeholder: {
        type: String,
        default: "placeholder",
    },

    error: {
        type: String,
        default: null,
    }
});


const model = defineModel();



</script>
