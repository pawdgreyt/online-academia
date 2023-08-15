<script setup>
import { Head, Link } from "@inertiajs/vue3";
import NavLayout from "@/Layouts/NavLayout.vue";
import Play from "vue-material-design-icons/Play.vue";

import { ref } from "vue";

let isPlaying = ref(true);

defineProps({
    video: Object,
    comments: Array,
    recommendedVideos: Array,
});
</script>

<template>
    <Head title="Watch" />
    <NavLayout>
        <main class="container mx-auto py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div
                    class="md:col-span-3 bg-gray-800 rounded-lg p-6 flex justify-center items-center"
                >
                    <video
                        src="/videos/nuxt_episode_1.mp4"
                        class="w-[1000px]"
                        controls
                        autoplay
                    />
                </div>
                <div
                    class="md:col-span-3 bg-gray-800 rounded-lg p-6 flex flex-col text-white"
                >
                    <h2 class="text-xl font-semibold mb-2">
                        Full Course Nuxt Js 3
                    </h2>
                    <div class="flex items-center mb-2">
                        <img
                            class="rounded-full w-8 h-8 mr-1.5"
                            src="https://cdn.iconscout.com/icon/free/png-512/free-avatar-366-456318.png?f=avif&w=256"
                        />
                        <div class="text-[14px] text-gray-300 font-extrabold">
                            Professor X
                        </div>
                    </div>
                </div>
                <div
                    class="md:col-span-3 bg-gray-800 rounded-lg p-6 flex flex-col text-white"
                >
                    <h2 class="text-xl font-semibold mb-4 text-white">
                        All Episodes
                    </h2>
                    <ul class="space-y-4">
                        <div
                            class="flex items-center justify-center cursor-pointer"
                        >
                            <li
                                class="w-full flex items-center space-x-4 rounded-lg"
                                :class="
                                    isPlaying
                                        ? 'bg-gray-600 h-[200px] hover:bg-gray-600'
                                        : 'hover:bg-gray-900'
                                "
                            >
                                <div class="flex-shrink-0">
                                    <img
                                        class="h-40 w-60 rounded-md"
                                        src="/course/nuxt.jpg"
                                        alt="Video Thumbnail"
                                    />
                                </div>
                                <div class="flex-grow">
                                    <h3
                                        class="text-lg font-semibold text-white"
                                    >
                                        Episode 1: Introduction
                                    </h3>
                                    <p class="text-gray-400">
                                        A brief overview of the series. Lorem
                                        ipsum dolor sit amet, consectetur
                                        adipiscing elit. Nulla urna neque,
                                        malesuada in mollis a, dictum nec mi. In
                                        hac habitasse platea dictumst. Fusce et
                                        congue turpis. Class aptent taciti
                                        sociosqu ad litora torquent per conubia
                                        nostra, per inceptos himenaeos. Ut
                                        faucibus libero in nibh sollicitudin
                                        vestibulum. Fusce ac malesuada leo. Duis
                                        vitae enim sem. Aliquam ultrices elit id
                                        neque sodales, sit amet aliquam turpis
                                        tincidunt.
                                    </p>
                                    <div
                                        class="text-white flex mt-3 items-center"
                                    >
                                        <Play fillColor="#FFFFFF" :size="25" />
                                        <span class="font-bold"
                                            >NOW PLAYING</span
                                        >
                                    </div>
                                </div>
                            </li>
                        </div>
                        <Link
                            :href="route('course.watchepisode', { id: 1 })"
                            class="flex items-center justify-center cursor-pointer"
                        >
                            <li
                                class="w-full flex items-center space-x-4 hover:bg-gray-900 rounded-lg"
                            >
                                <div class="flex-shrink-0">
                                    <img
                                        class="h-40 w-60 rounded-md"
                                        src="/course/nuxt.jpg"
                                        alt="Video Thumbnail"
                                    />
                                </div>
                                <div class="flex-grow">
                                    <h3
                                        class="text-lg font-semibold text-white"
                                    >
                                        Episode 2: Getting Started
                                    </h3>
                                    <p class="text-gray-400">
                                        Setting up your environment. Lorem ipsum
                                        dolor sit amet, consectetur adipiscing
                                        elit. Nulla urna neque, malesuada in
                                        mollis a, dictum nec mi. In hac
                                        habitasse platea dictumst. Fusce et
                                        congue turpis. Class aptent taciti
                                        sociosqu ad litora torquent per conubia
                                        nostra, per inceptos himenaeos. Ut
                                        faucibus libero in nibh sollicitudin
                                        vestibulum. Fusce ac malesuada leo. Duis
                                        vitae enim sem. Aliquam ultrices elit id
                                        neque sodales, sit amet aliquam turpis
                                        tincidunt.
                                    </p>
                                </div>
                            </li>
                        </Link>
                    </ul>
                </div>
            </div>
        </main>
    </NavLayout>
</template>
