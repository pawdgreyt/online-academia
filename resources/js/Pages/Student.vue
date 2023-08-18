<script setup>
import { Head } from "@inertiajs/vue3";
import NavLayout from "@/Layouts/NavLayout.vue";

defineProps({ student: Array });
</script>
<template>
    <Head title="Student Details" />
    <NavLayout>
        <main class="container mx-auto py-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="md:col-span-4 bg-gray-800 rounded-lg p-6 flex">
                    <img
                        class="rounded-full"
                        width="35"
                        src="/images/astronaut.png"
                    />
                    <h2 class="text-white ml-2 font-extrabold py-1">
                        Details of Student: {{ student.name }}
                    </h2>
                </div>
                <div class="md:col-span-2 bg-gray-800 rounded-lg p-6 flex">
                    <div class="mr-4">
                        <p class="text-white font-semibold">Name:</p>
                        <p class="text-white">{{ student.name }}</p>

                        <p class="text-white font-semibold mt-3">Email:</p>
                        <p class="text-white">{{ student.email }}</p>

                        <p class="text-white font-semibold mt-3">
                            Account Created:
                        </p>
                        <p class="text-white">{{ student.created_at }}</p>
                    </div>
                </div>
                <div class="md:col-span-2 bg-gray-800 rounded-lg p-6 flex">
                    <div class="mr-4">
                        <p class="text-white font-semibold">Account ID:</p>
                        <p class="text-white">{{ student.id }}</p>
                        <p class="text-white font-semibold mt-3">Role:</p>
                        <p class="text-white">{{ student.role }}</p>
                        <p class="text-white font-semibold mt-3">Auth Type:</p>
                        <p class="text-white">{{ student.auth_type }}</p>
                    </div>
                </div>
                <div class="md:col-span-4 bg-gray-800 rounded-lg p-6 flex">
                    <h4 class="text-white ml-2 font-extrabold py-1">
                        Courses Enrolled
                    </h4>
                </div>
            </div>
        </main>
    </NavLayout>
</template>
