<template>
    <li
        :class="[!openSideNav ? 'p-2' : 'flex items-center p-2']"
        class="text-white text-sm font-semibold text-center hover:bg-gray-900 rounded-lg cursor-pointer"
    >
        <div :class="[!openSideNav ? 'w-full flex justify-center' : '']">
            <component :is="icon" />
        </div>
        <div :class="[!openSideNav ? '' : 'mt-1 ml-4']">
            <span v-if="!openSideNav">{{ iconString.substring(0, 4) }}</span>
            <span v-else>{{ iconString }}</span>
        </div>
    </li>
</template>

<script setup>
import { defineProps, toRefs } from "vue";

import Home from "vue-material-design-icons/Home.vue";
import ChairSchool from "vue-material-design-icons/ChairSchool.vue";
import Library from "vue-material-design-icons/Library.vue";
import AccountSchool from "vue-material-design-icons/AccountSchool.vue";
import BookPlus from "vue-material-design-icons/BookPlus.vue";

const props = defineProps({
    openSideNav: Boolean,
    iconString: String,
});

const { openSideNav, iconString } = toRefs(props);

let icon = null;

if (iconString.value === "Home") icon = Home;
if (iconString.value === "Courses") icon = ChairSchool;
if (iconString.value === "Library") icon = Library;
if (iconString.value === "Manage Students") icon = AccountSchool;
if (iconString.value === "Create Course") icon = BookPlus;
</script>
