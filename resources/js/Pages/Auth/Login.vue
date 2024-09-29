<template>
    <section class="min-h-[100vh] flex justify-center items-center">
        <form @submit.prevent="form.post(route('auth.login'))"
        class="max-w-md">

            <TextField v-model="form.email" placeholder="exmple@gmail.com" label="Email" :error="form.errors.email" />
            <TextField v-model="form.password" placeholder="Password must be more 8 characters" label="Password"
                :error="form.errors.password" />

            <button type="submit" class="bg-gray-800 w-[250px]">Login</button>
        </form>

    </section>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import TextField from "@/Components/TextField.vue";

const form = useForm({
    email: '',
    password: '',
    remember: false,
})

</script>
