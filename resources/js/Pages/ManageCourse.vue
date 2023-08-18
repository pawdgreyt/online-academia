<script setup>
import { Head, Link } from "@inertiajs/vue3";
import NavLayout from "@/Layouts/NavLayout.vue";

defineProps({ courses: Array });
</script>
<template>
    <Head title="Manage Courses" />
    <NavLayout>
        <main class="container mx-auto py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="md:col-span-3 bg-gray-800 rounded-lg p-6 flex">
                    <h2 class="text-white font-extrabold">Manage Courses</h2>
                </div>

                <div class="md:col-span-3 bg-gray-800 rounded-lg p-6">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <table class="min-w-full">
                            <thead class="border-b">
                                <tr class="text-white flex justify-around">
                                    <th
                                        scope="col"
                                        class="text-sm font-medium px-6 py-4"
                                    >
                                        Course
                                    </th>
                                    <th
                                        scope="col"
                                        class="text-sm font-medium px-6 py-4"
                                    >
                                        Course Title
                                    </th>
                                    <th
                                        scope="col"
                                        class="text-sm font-medium px-6 py-4"
                                    >
                                        Course Instructor
                                    </th>
                                    <th
                                        scope="col"
                                        class="text-sm font-medium px-6 py-4"
                                    >
                                        Option
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <div v-for="course in courses" :key="course">
                                    <Link
                                        :href="
                                            route('course.show', {
                                                id: course.id,
                                            })
                                        "
                                    >
                                        <tr
                                            class="border-b flex items-center justify-center hover:bg-gray-600 rounded-sm"
                                        >
                                            <td
                                                class="px-6 py-4 w-4/12 text-sm font-medium text-white"
                                            >
                                                <img
                                                    class="transition ease-in-out delay-150 rounded-lg"
                                                    :src="
                                                        course.thumbnail || ''
                                                    "
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
                                                            route(
                                                                'course.destroy',
                                                                {
                                                                    id: course.id,
                                                                }
                                                            )
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
                                    </Link>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </NavLayout>
</template>
