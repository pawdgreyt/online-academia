<script setup>
import { ref } from "vue";
import { Head, router } from "@inertiajs/vue3";
import NavLayout from "@/Layouts/NavLayout.vue";

defineProps({ errors: Object });

let course_title = ref("");
let course_thumbnail = ref("");
let course_instructor = ref("");
let course_price = ref("");
let course_overview = ref("");

let error = ref({
    course_title: null,
    course_thumbnail: null,
    course_instructor: null,
    course_price: null,
    course_overview: null,
});

const episodes = ref([
    {
        thumbnail: null,
        video: null,
        title: "",
        description: "",
    },
]);

const addCourse = () => {
    let err = false;

    error.value.course_title = null;
    error.value.course_thumbnail = null;
    error.value.course_instructor = null;
    error.value.course_price = null;
    error.value.course_overview = null;

    if (!course_title.value) {
        error.value.course_title = "Please enter Course Title";
        err = true;
    }
    if (!course_thumbnail.value) {
        error.value.course_thumbnail = "Please select a thumbnail";
        err = true;
    }
    if (!course_instructor.value) {
        error.value.course_instructor = "Please enter Course Instructor";
        err = true;
    }

    if (!course_price.value) {
        error.value.course_price = "Please enter Course Price";
        err = true;
    }

    if (!course_overview.value) {
        error.value.course_overview = "Please enter Course Overview";
        err = true;
    }

    if (err) {
        return;
    }

    let data = new FormData();

    data.append("title", course_title.value);
    data.append("instructor", course_instructor.value);
    data.append("thumbnail", course_thumbnail.value);
    data.append("current_price", course_price.value);
    data.append("course_overview", course_overview.value);
    episodes.value = episodes.value.map((episode, index) => {
        data.append(`episodes[${index}][thumbnail]`, episode.thumbnail);
        data.append(`episodes[${index}][video]`, episode.video);
        data.append(`episodes[${index}][title]`, episode.title);
        data.append(`episodes[${index}][description]`, episode.description);
        return episode; // Return the modified episode to keep reactivity
    });

    // console.log data form
    // for (var pair of data.entries()) {
    //     console.log(pair[0] + ", " + pair[1]);
    // }

    router.post("/addcourse", data);
};

const handleThumbnailChange = (index, e) => {
    const file = e.target.files[0];
    episodes.value[index].thumbnail = file;
};

const handleVideoChange = (index, e) => {
    const file = e.target.files[0];
    episodes.value[index].video = file;
};

const getImage = (e) => (course_thumbnail.value = e.target.files[0]);

const addEpisode = () => {
    episodes.value.push({
        thumbnail: null,
        video: null,
        title: "",
        description: "",
    });
};

const removeEpisode = (index) => {
    episodes.value.splice(index, 1);
};
</script>

<template>
    <Head title="Add Course" />

    <NavLayout>
        <main class="container mx-auto py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="md:col-span-3 bg-gray-800 rounded-lg p-6 flex">
                    <h2 class="text-white font-extrabold">Add New Course</h2>
                </div>
                <div class="md:col-span-3 bg-gray-800 rounded-lg p-6 flex">
                    <form class="w-full" @submit.prevent="addCourse">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label
                                    class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                                    for="grid-first-name"
                                >
                                    Course Title
                                    <span class="text-red-600">*</span>
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="grid-first-name"
                                    type="text"
                                    placeholder="Course Title"
                                    v-model="course_title"
                                />
                                <p
                                    v-if="error.course_title"
                                    class="text-red-500 text-xs italic"
                                >
                                    {{ error.course_title }}
                                </p>
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label
                                    class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                                    for="grid-first-name"
                                >
                                    Course Instructor
                                    <span class="text-red-600">*</span>
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="grid-first-name"
                                    type="text"
                                    placeholder="Course Title"
                                    v-model="course_instructor"
                                />
                                <p
                                    v-if="error.course_instructor"
                                    class="text-red-500 text-xs italic"
                                >
                                    {{ error.course_instructor }}
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label
                                    class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                                    for="grid-password"
                                >
                                    Course Overview
                                    <span class="text-red-600">*</span>
                                </label>
                                <textarea
                                    v-model="course_overview"
                                    type="text"
                                    class="form-control block w-full px-5 py-1.5 text-xl font-normal text-gray-700 bg-gray-200 placeholder-gray-700 bg-clip-padding border border-solid border-gray-600 rounded transition ease-in-out m-0 border-transparent focus:ring-0"
                                >
                                </textarea>
                                <p
                                    v-if="error.course_overview"
                                    class="text-red-500 text-xs italic"
                                >
                                    {{ error.course_overview }}
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label
                                    class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                                    for="grid-first-name"
                                >
                                    Course Price
                                    <span class="text-red-600">*</span>
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="grid-first-name"
                                    type="number"
                                    min="0.1"
                                    step="0.1"
                                    placeholder="Course Price"
                                    v-model="course_price"
                                />
                                <p
                                    v-if="error.course_price"
                                    class="text-red-500 text-xs italic"
                                >
                                    {{ error.course_price }}
                                </p>
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label
                                    class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                                    for="grid-first-name"
                                >
                                    Course Thumbnail
                                    <span class="text-red-600">*</span>
                                </label>
                                <input
                                    @change="getImage"
                                    class="form-control block w-full px-3 py-1.5 border text-white border-solid border-gray-600 rounded transition ease-in-out m-0 focus:text-gray-700 focus:border-blue-600 focus:outline-none"
                                    type="file"
                                    id="formFile"
                                />
                                <p
                                    v-if="error.course_thumbnail"
                                    class="text-red-500 text-xs italic"
                                >
                                    {{ error.course_thumbnail }}
                                </p>
                            </div>
                        </div>
                        <hr
                            class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700"
                        />
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <button
                                    @click="addEpisode"
                                    type="button"
                                    class="text-white bg-blue-500 hover:bg-blue-600 py-2 px-4 rounded"
                                >
                                    Add Episode
                                </button>
                            </div>
                            <div class="w-full px-3 rounded-sm mt-3">
                                <table
                                    class="table-fixed border bg-white w-full"
                                >
                                    <thead v-if="episodes.length > 0">
                                        <tr>
                                            <th class="border px-2 py-2">#</th>
                                            <th class="border px-4 py-2 w-40">
                                                <!-- Adjust the width as needed -->
                                                Title
                                            </th>
                                            <th class="border px-4 py-2 w-60">
                                                <!-- Adjust the width as needed -->
                                                Description
                                            </th>
                                            <th class="border px-4 py-2">
                                                Thumbnail
                                            </th>
                                            <th class="border px-4 py-2">
                                                Video
                                            </th>
                                            <th class="border px-2 py-2">
                                                <!-- Adjust the padding as needed -->
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="(episode, index) in episodes"
                                            :key="index"
                                        >
                                            <td
                                                class="border-b pb-[20px] flex items-center justify-center"
                                            >
                                                # {{ index + 1 }}
                                            </td>
                                            <td class="border px-4 py-2 w-40">
                                                <!-- Adjust the width as needed -->
                                                <input
                                                    type="text"
                                                    v-model="episode.title"
                                                    placeholder="Episode Title"
                                                    class="w-full"
                                                />
                                            </td>
                                            <td class="border px-4 py-2 w-60">
                                                <!-- Adjust the width as needed -->
                                                <input
                                                    type="text"
                                                    v-model="
                                                        episode.description
                                                    "
                                                    placeholder="Episode Description"
                                                    class="w-full"
                                                />
                                            </td>
                                            <td class="border px-4 py-2">
                                                <input
                                                    type="file"
                                                    @change="
                                                        handleThumbnailChange(
                                                            index,
                                                            $event
                                                        )
                                                    "
                                                    accept="image/*"
                                                />
                                            </td>
                                            <td class="border px-4 py-2">
                                                <input
                                                    type="file"
                                                    @change="
                                                        handleVideoChange(
                                                            index,
                                                            $event
                                                        )
                                                    "
                                                    accept="video/*"
                                                />
                                            </td>
                                            <td
                                                class="border px-2 py-2 flex items-center justify-center"
                                            >
                                                <!-- Adjust the padding as needed -->
                                                <button
                                                    type="button"
                                                    @click="
                                                        removeEpisode(index)
                                                    "
                                                    class="bg-red-600 text-white p-3 rounded-sm"
                                                >
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="float-right">
                            <button
                                type="submit"
                                class="text-white bg-green-600 hover:bg-green-700 font-bold py-2 px-4 rounded cursor-pointer"
                            >
                                Add Course
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </NavLayout>
</template>
