<template>
    <Head title="Create Item" />

    <AuthenticatedLayout>

        <template #header>
            <div class="flex justify-between">
                <h2>Create Item</h2>
                <div>
                    <Link href="/items" class="px-4 py-2 bg-gray-100 shadow border-gray-300 border hover:bg-white rounded">
                        Back
                    </Link>
                </div>
            </div>
        </template>

        <div class="py-8 w-[400px] mx-auto px-4 rounded bg-white mt-8 shadow">

            <form @submit.prevent="submit">
                <div class="flex flex-col mb-3">
                    <label for="name">Name</label>
                    <input type="text" id="name" v-model="form.name" class="h-full border-gray-400 rounded" />
                    <div class="text-red-600" v-if="form.errors.name">{{ form.errors.name }}</div>
                </div>
                <div class="flex flex-col mb-3">
                    <label for="description">Description</label>
                    <textarea id="description" v-model="form.description" class="h-full border-gray-400 rounded"></textarea>
                    <div class="text-red-600" v-if="form.errors.description">{{ form.errors.description }}</div>
                </div>
                <div class="flex justify-between">
                    <div class="flex flex-col mb-3 w-[45%]">
                        <label for="price">Price</label>
                        <input type="number" step="0.01" id="price" v-model="form.price" class="h-full border-gray-400 rounded text-right" />
                        <div class="text-red-600" v-if="form.errors.price">{{ form.errors.price }}</div>
                    </div>
                    <div class="flex flex-col mb-3 w-[45%]">
                        <label for="qty">Quantity</label>
                        <input type="number" id="qty" v-model="form.qty" class="h-full border-gray-400 rounded text-center" />
                        <div class="text-red-600" v-if="form.errors.qty">{{ form.errors.qty }}</div>
                    </div>
                </div>
                <div class="flex flex-col mb-3">
                    <label for="pic">Product Picture</label>
                    <input type="file" @input="form.pic = $event.target.files[0]" class="h-full border-gray-400 rounded text-center" accept="image/jpeg" />
                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                        {{ form.progress.percentage }}%
                    </progress>
                </div>
                <button class="px-4 py-2 bg-blue-200 w-full rounded border border-blue-300 shadow hover:bg-white">
                    Create Item
                </button>
            </form>

        </div>

    </AuthenticatedLayout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm } from '@inertiajs/vue3';

const form =  useForm({
    name: null,
    description: null,
    price: 0,
    qty: 0,
    pic: null
})

function submit() {
    form.post('/items');
}
</script>
