<script setup>
import { Head, Link } from "@inertiajs/vue3";
import NavLayout from "@/Layouts/NavLayout.vue";
import Star from "vue-material-design-icons/Star.vue";
import StarHalfFull from "vue-material-design-icons/StarHalfFull.vue";

defineProps({
    course: Object,
    episodes: Array,
});
</script>

<template>
    <Head title="View Course" />
    <NavLayout>
        <main class="container mx-auto py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="md:col-span-2 bg-gray-800 rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4 text-white">
                        Course Overview
                    </h2>
                    <p class="text-white mb-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Nulla urna neque, malesuada in mollis a, dictum nec mi.
                        In hac habitasse platea dictumst. Fusce et congue
                        turpis. Class aptent taciti sociosqu ad litora torquent
                        per conubia nostra, per inceptos himenaeos. Ut faucibus
                        libero in nibh sollicitudin vestibulum. Fusce ac
                        malesuada leo. Duis vitae enim sem. Aliquam ultrices
                        elit id neque sodales, sit amet aliquam turpis
                        tincidunt. Phasellus sollicitudin metus ut tempus
                        luctus. Proin accumsan mattis tempus. Donec est orci,
                        efficitur blandit aliquam quis, ultricies at ipsum.
                        Donec ac augue id tortor elementum mollis. Quisque
                        elementum est quis sem tempor rhoncus. Quisque vel nisi
                        felis.
                    </p>
                </div>
                <div class="bg-gray-800 rounded-lg p-6">
                    <img
                        src="/course/nuxt.jpg"
                        alt="Course Image"
                        class="mb-4 rounded-lg"
                    />
                    <h2 class="text-xl font-semibold mb-4 text-white">
                        Full Course Nuxt Js 3
                    </h2>
                    <div>
                        <img
                            class="rounded-full m-1.5 mt-2 flex items-baseline w-8 h-8"
                            src="https://cdn.iconscout.com/icon/free/png-512/free-avatar-366-456318.png?f=avif&w=256"
                        />
                    </div>
                    <div class="px-1.5 text-white mt-1">
                        <div
                            class="text-[14px] text-gray-300 font-extrabold flex gap-1 items-center cursor-pointer"
                        >
                            Professor X
                        </div>
                        <div class="flex">
                            <Star fillColor="#FFD700" :size="17" />
                            <Star fillColor="#FFD700" :size="17" />
                            <Star fillColor="#FFD700" :size="17" />
                            <Star fillColor="#FFD700" :size="17" />
                            <StarHalfFull fillColor="#FFD700" :size="17" />
                        </div>
                        <div class="text-lg mb-1 mt-3 text-gray-300">
                            Php 1,499
                        </div>
                    </div>
                    <button
                        class="mt-3 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-800 duration-300"
                    >
                        Enroll Now
                    </button>
                </div>
                <div class="md:col-span-3 bg-gray-800 rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4 text-white">
                        Episodes List
                    </h2>
                    <ul class="space-y-4">
                        <li class="w-full flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img
                                    class="h-40 w-60 rounded-md"
                                    src="/course/nuxt.jpg"
                                    alt="Video Thumbnail"
                                />
                            </div>
                            <div class="flex-grow">
                                <h3 class="text-lg font-semibold text-white">
                                    Episode 1: Introduction
                                </h3>
                                <p class="text-gray-400">
                                    A brief overview of the series. Lorem ipsum
                                    dolor sit amet, consectetur adipiscing elit.
                                    Nulla urna neque, malesuada in mollis a,
                                    dictum nec mi. In hac habitasse platea
                                    dictumst. Fusce et congue turpis. Class
                                    aptent taciti sociosqu ad litora torquent
                                    per conubia nostra, per inceptos himenaeos.
                                    Ut faucibus libero in nibh sollicitudin
                                    vestibulum. Fusce ac malesuada leo. Duis
                                    vitae enim sem. Aliquam ultrices elit id
                                    neque sodales, sit amet aliquam turpis
                                    tincidunt.
                                </p>
                            </div>
                        </li>
                        <li class="w-full flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img
                                    class="h-40 w-60 rounded-md"
                                    src="/course/nuxt.jpg"
                                    alt="Video Thumbnail"
                                />
                            </div>
                            <div class="flex-grow">
                                <h3 class="text-lg font-semibold text-white">
                                    Episode 2: Getting Started
                                </h3>
                                <p class="text-gray-400">
                                    Setting up your environment. Lorem ipsum
                                    dolor sit amet, consectetur adipiscing elit.
                                    Nulla urna neque, malesuada in mollis a,
                                    dictum nec mi. In hac habitasse platea
                                    dictumst. Fusce et congue turpis. Class
                                    aptent taciti sociosqu ad litora torquent
                                    per conubia nostra, per inceptos himenaeos.
                                    Ut faucibus libero in nibh sollicitudin
                                    vestibulum. Fusce ac malesuada leo. Duis
                                    vitae enim sem. Aliquam ultrices elit id
                                    neque sodales, sit amet aliquam turpis
                                    tincidunt.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                By adding the w-full class to the
                <li>
                    elements, you're ensuring that each list item takes up the
                    full width of the container. This way, the entire content
                    within each list item will span across the width of the
                    enclosing
                </li>
            </div>
        </main>
    </NavLayout>
</template>
