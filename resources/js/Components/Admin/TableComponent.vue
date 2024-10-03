<template>
    <table class="table-fixed w-[90%] m-auto text-center">
        <tr class="border-[1px] border-gray-200 rounded-sm break-words text-gray-700">
            <th class="text-sm">Name</th>
            <th class="text-sm">Email</th>
            <th class="text-sm">Phone</th>
            <th class="text-sm">Role</th>
            <th class="text-sm">Authorization</th>
            <th class="text-sm">Created</th>
        </tr>
        <tbody>
            <tr v-for="user in props.users.data" :key="user.id" class="border-[1px] break-words
             border-gray-200 rounded-sm text-gray-700 text-sm">
                <td class="border-[1px] ">{{ user.name }}</td>
                <td class="border-[1px] ">{{ user.email }}</td>
                <td class="border-[1px] ">{{ user.phone }}</td>
                <td class="border-[1px] ">
                    <span v-for="role in user.roles" :key="role.id" class="grid m-1 ">{{ role.role }}</span>
                </td>
                <td >
                    <Link  as="button"
                     v-for="role in user.roles" :key="role.id"
                     method="post" :href="route('admins.update',role.id)" :class="['block  m-auto w-auto px-1 rounded-sm ',
                        { ' bg-red-500 px-1 rounded-sm text-gray-300': role.isAuthorizedSeller == 'Pending' },
                        { ' bg-green-500  px-1 rounded-sm text-gray-100': role.isAuthorizedSeller == 'Active' },
                    ]">
                        {{ role.isAuthorizedSeller }}
                    </Link>
                </td>

                <td class="border-[1px] ">{{ user.created_at }}</td>
            </tr>
        </tbody>
    </table>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    users: Object
})

</script>
