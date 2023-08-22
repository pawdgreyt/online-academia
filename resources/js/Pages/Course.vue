<script setup>
import { Head, Link } from "@inertiajs/vue3";
import NavLayout from "@/Layouts/NavLayout.vue";
import Star from "vue-material-design-icons/Star.vue";
import StarHalfFull from "vue-material-design-icons/StarHalfFull.vue";

defineProps({
    course: Object,
    episodes: Array,
});

const trimLongText = (string, length) => {
    if (string.length <= length) {
        return string;
    } else {
        const trimmedString = string.slice(0, length).trim();
        const trimmedStringWithEllipsis = trimmedString + "...";

        return trimmedStringWithEllipsis;
    }
};
</script>

<template>
    <Head :title="course.title" />
    <NavLayout>
        <main class="container mx-auto py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="md:col-span-2 bg-gray-800 rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4 text-white">
                        Course Overview
                    </h2>
                    <p
                        class="text-white mb-4 flex items-center justify-center text-justify"
                    >
                        {{ course.overview }}
                    </p>
                </div>
                <div class="bg-gray-800 rounded-lg p-6">
                    <img
                        :src="course.thumbnail"
                        alt="Course Image"
                        class="mb-4 rounded-lg"
                    />
                    <h2 class="text-xl font-semibold mb-4 text-white">
                        {{ course.title }}
                    </h2>
                    <div>
                        <img
                            class="rounded-full m-1.5 mt-2 flex items-baseline w-8 h-8"
                            :src="`https://picsum.photos/${
                                course.id + 190
                            }/300`"
                        />
                    </div>
                    <div class="px-1.5 text-white mt-1">
                        <div
                            class="text-[14px] text-gray-300 font-extrabold flex gap-1 items-center cursor-pointer"
                        >
                            {{ course.instructor }}
                        </div>
                        <div class="flex">
                            <Star fillColor="#FFD700" :size="17" />
                            <Star fillColor="#FFD700" :size="17" />
                            <Star fillColor="#FFD700" :size="17" />
                            <Star fillColor="#FFD700" :size="17" />
                            <StarHalfFull fillColor="#FFD700" :size="17" />
                        </div>
                        <div class="text-lg mb-1 mt-3 text-gray-300">
                            <span
                                class="text-gray-400 line-through"
                                v-if="course.orig_price > course.current_price"
                                >Php {{ course.orig_price }}</span
                            >
                            Php {{ course.current_price }}
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
                        <div v-for="episode in episodes" :key="episode">
                            <Link
                                :href="
                                    route('course.watchepisode', {
                                        id: episode.id,
                                    })
                                "
                                class="flex items-center justify-center cursor-pointer"
                            >
                                <li
                                    class="w-full flex items-center space-x-4 hover:bg-gray-900 rounded-lg"
                                >
                                    <div class="flex-shrink-0">
                                        <img
                                            class="h-40 w-60 rounded-md"
                                            :src="episode.episode_thumbnail"
                                            alt="Video Thumbnail"
                                        />
                                    </div>
                                    <div class="flex-grow">
                                        <h3
                                            class="text-lg font-semibold text-white"
                                        >
                                            {{ episode.episode_title }}
                                        </h3>
                                        <p class="text-gray-400">
                                            {{
                                                trimLongText(
                                                    episode.episode_description,
                                                    150
                                                )
                                            }}
                                        </p>
                                    </div>
                                </li>
                            </Link>
                        </div>

                        <!-- Code for skeleton -->
                        <!-- <div
                            role="status"
                            class="space-y-8 animate-pulse md:space-y-0 md:space-x-8 md:flex md:items-center w-full"
                        >
                            <div
                                class="flex items-center justify-center w-60 h-48 bg-slate-600 rounded sm:w-96 dark:bg-gray-700"
                            >
                                <svg
                                    class="w-10 h-10 text-gray-200 dark:text-gray-600"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor"
                                    viewBox="0 0 16 20"
                                >
                                    <path
                                        d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z"
                                    />
                                    <path
                                        d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM9 13a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2Zm4 .382a1 1 0 0 1-1.447.894L10 13v-2l1.553-1.276a1 1 0 0 1 1.447.894v2.764Z"
                                    />
                                </svg>
                            </div>
                            <div class="w-full">
                                <div
                                    class="h-2.5 bg-slate-600 rounded-full dark:bg-gray-700 w-48 mb-4"
                                ></div>
                                <div
                                    class="h-2 bg-slate-600 rounded-full dark:bg-gray-700 max-w-[850px] mb-2.5"
                                ></div>
                                <div
                                    class="h-2 bg-slate-600 rounded-full dark:bg-gray-700 max-w-[750px] mb-2.5"
                                ></div>
                                <div
                                    class="h-2 bg-slate-600 rounded-full dark:bg-gray-700 max-w-[790px] mb-2.5"
                                ></div>
                                <div
                                    class="h-2 bg-slate-600 rounded-full dark:bg-gray-700 max-w-[670px] mb-2.5"
                                ></div>
                                <div
                                    class="h-2 bg-slate-600 rounded-full dark:bg-gray-700 max-w-[840px]"
                                ></div>
                            </div>
                        </div> -->
                    </ul>
                </div>
            </div>
        </main>
    </NavLayout>
</template>
