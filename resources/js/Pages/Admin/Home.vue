<template>

    <section class="min-h-[100dvh] w-[100%] bg-gray-50">
        <PageName name="Home" />

        <div class=" flex flex-col  w-[80%] m-auto h-max text-sm text-gray-400">
            <div class="flex flex-wrap justify-between">
                <strong>Total Authorization: {{ props.counts.totals.all_counts }}</strong>
                <strong>Request (Pending) : {{ props.counts.totals.pending_counts }}</strong>
                <strong>Authorized (Active) : {{ props.counts.totals.active_counts }}</strong>
            </div>
        </div>
        <div class="w-[90%] m-auto">
            <TableComponent :users="props.users" />
        </div>
    </section>
</template>
<script setup>
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
import TableComponent from '@/Components/Admin/TableComponent.vue';
import PageName from '@/Components/PageName.vue'

defineOptions({
    layout: DefaultLayout,
    head: "Admin",
})

const props = defineProps({
    users: Object,
    counts: Object,

})



</script>
