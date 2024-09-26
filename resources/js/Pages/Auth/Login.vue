<template>
<section class="min-h-[100vh] flex justify-center items-center">
    <form @submit.prevent="form.post(route('auth.login'))">
        <input type="text" placeholder="email" v-model="form.email" >
        <input type="text" placeholder="password" v-model="form.password">
        <button type="submit" class="bg-gray-800 w-[250px]">Login</button>
    </form>

</section>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";


const form = useForm({
    email:'',
    password:'',
    remember:false,
})

</script>
