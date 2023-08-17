<script setup>
import { Head, Link } from "@inertiajs/vue3";
import NavLayout from "@/Layouts/NavLayout.vue";

defineProps({ courses: Array });
</script>
<template>
    <Head title="Manage Courses" />

    <NavLayout>
        {{}}
        <div class="max-w-4xl mx-auto p-4">
            <table class="min-w-full">
                <thead class="border-b">
                    <tr class="text-white flex justify-between">
                        <th scope="col" class="text-sm font-medium px-6 py-4">
                            Course
                        </th>
                        <th scope="col" class="text-sm font-medium px-6 py-4">
                            Course Title
                        </th>
                        <th scope="col" class="text-sm font-medium px-6 py-4">
                            Course Instructor
                        </th>
                        <th scope="col" class="text-sm font-medium px-6 py-4">
                            Option
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <div v-for="course in courses" :key="course">
                        <tr class="border-b flex items-center justify-center">
                            <td
                                class="px-6 py-4 w-7/12 text-sm font-medium text-white"
                            >
                                <img
                                    class="transition ease-in-out delay-150 rounded-lg"
                                    :src="course.thumbnail || ''"
                                />
                            </td>
                            <td
                                class="px-6 py-4 w-7/12 text-sm font-medium text-white"
                            >
                                {{ course.title }}
                            </td>
                            <td
                                class="px-6 py-4 w-7/12 text-sm font-medium text-white"
                            >
                                {{ course.instructor }}
                            </td>
                            <td
                                class="px-6 py-4 w-5/12 text-sm font-medium text-white relative text-center"
                            >
                                <div class="w-full">
                                    <Link
                                        :href="
                                            route('course.destroy', {
                                                id: course.id,
                                            })
                                        "
                                        as="button"
                                        method="delete"
                                        class="text-white py-3 text-sm bg-red-600 hover:bg-red-800 duration-300 font-bold px-3 rounded cursor-pointer"
                                    >
                                        Delete
                                    </Link>
                                </div>
                            </td>
                        </tr>
                    </div>
                </tbody>
            </table>
        </div>
    </NavLayout>
</template>
