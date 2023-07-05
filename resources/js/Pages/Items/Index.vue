<template>
    <Head title="Items" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2>Items</h2>
                <div>
                    <Link v-if="prop.auth.user.permissions.includes('create-item')" href="/items/create" class="px-4 py-2 bg-gray-100 shadow border-gray-300 border hover:bg-white rounded">
                        Create Item
                    </Link>
                </div>
            </div>
        </template>

        <div class="py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-sm grid grid-cols-3 grid-flow-row gap-4 sm:rounded-lg">
                    <ItemComponent v-for="item in items" :key="item.id" :item="item" />
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ItemComponent from '@/Components/ItemComponent.vue';
import { Head, Link } from '@inertiajs/vue3';



const prop = defineProps({
    items: Array,
    auth: Object
})

</script>
