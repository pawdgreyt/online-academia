<script setup>
import { Head } from "@inertiajs/vue3";
import NavLayout from "@/Layouts/NavLayout.vue";

defineProps({ student: Array });
</script>
<template>
    <Head title="Student Details" />
    <NavLayout>
        <span class="text-white">{{ student }}</span>
        <main class="container mx-auto py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="md:col-span-3 bg-gray-800 rounded-lg p-6 flex">
                    <img
                        class="rounded-full"
                        width="35"
                        src="/images/astronaut.png"
                    />
                    <h2 class="text-white ml-2 font-extrabold py-1">
                        Details of Student: {{ student.name }}
                    </h2>
                </div>
                <div class="md:col-span-3 bg-gray-800 rounded-lg p-6 flex">
                    <h4 class="text-white ml-2 font-extrabold py-1">
                        Student Information
                    </h4>
                </div>
                <div class="md:col-span-3 bg-gray-800 rounded-lg p-6 flex">
                    <h4 class="text-white ml-2 font-extrabold py-1">
                        Courses Enrolled
                    </h4>
                </div>
            </div>
        </main>
    </NavLayout>
</template>
