<template>

    <section class="min-h-[100vh] bg-gray-50 w-[100%]">
        admin


        <table class="border-collapse w-[90%] m-auto text-center">
            <tr class="border-[1px] border-gray-200 rounded-sm text-gray-700">
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Authorization</th>
                <th>Created</th>
            </tr>
            <tbody>
                <tr v-for="user in props.users.data" :key="user.id" class="border-[1px]
                 border-gray-200 rounded-sm text-gray-700 text-sm">
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.phone }}</td>
                    <td>
                        <span v-for="role in user.roles" :key="role.id" class="block">{{ role.role }}</span>
                    </td>
                    <td>
                        <button v-for="role in user.roles" :key="role.id" :class="['block m-1 w-[100%] px-1 rounded-sm ',
                            { ' bg-red-500 m-1 px-1 rounded-sm text-gray-300': role.isAuthorizedSeller == 'Pending' },
                            { ' bg-green-500 m-1 px-1 rounded-sm text-gray-100': role.isAuthorizedSeller == 'Active' },
                        ]">
                            {{ role.isAuthorizedSeller }}
                        </button>
                    </td>

                    <td>{{ user.created_at }}</td>
                </tr>
            </tbody>
        </table>
    </section>
</template>
<script setup>
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
import { ref } from 'vue';

defineOptions({
    layout: DefaultLayout,
})

const props = defineProps({
    users: Object,
})



</script>
