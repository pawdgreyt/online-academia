<script setup>
import { ref, onMounted } from "vue";
import { usePage, Link } from "@inertiajs/vue3";
import SideNavItem from "../Components/SideNavItem.vue";
import MenuIcon from "vue-material-design-icons/Menu.vue";
import MagnifyIcon from "vue-material-design-icons/Magnify.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";

let openSideNav = ref(true);
let openSideNavOverlay = ref(false);
let sideNavOverlay = ref(null);
let width = ref(document.documentElement.clientWidth);

onMounted(() => {
    resize();
    sideNavOverlay.value.classList.value =
        sideNavOverlay.value.classList.value += " hidden";
    window.addEventListener("resize", () => {
        width.value = document.documentElement.clientWidth;
        resize();
    });
});

const resize = () => {
    if (width.value < 1280 && openSideNav.value) {
        openSideNav.value = false;
    }
    if (width.value > 1279 && !openSideNav.value) {
        openSideNav.value = true;
    }
};

const isNavOverlay = () => {
    if (usePage().url === "/") openSideNav.value = !openSideNav.value;
    if (usePage().url === "/view_course/1")
        openSideNavOverlay.value = !openSideNavOverlay.value;
    if (usePage().url === "/delete-video")
        openSideNavOverlay.value = !openSideNavOverlay.value;
    if (usePage().url === "/profile")
        openSideNavOverlay.value = !openSideNavOverlay.value;
    if (width.value < 640) openSideNavOverlay.value = !openSideNavOverlay.value;
    if (usePage().url !== "/" && width.value < 640)
        openSideNavOverlay.value = !openSideNavOverlay.value;
    if (usePage().props.view_course)
        openSideNavOverlay.value = !openSideNavOverlay.value;
};
</script>

<template>
    <div class="relative">
        <div
            id="TopNav"
            class="w-[100%] h-[60px] fixed bg-slate-700 z-20 flex items-center justify-between"
        >
            <div class="flex items-center">
                <button
                    @click="isNavOverlay()"
                    class="p-2 ml-3 rounded-full hover:bg-gray-900 inline-block cursor-pointer"
                >
                    <MenuIcon fillColor="#FFFFFF" :size="26" />
                </button>
                <div class="mx-2"></div>
                <Link
                    :href="route('home')"
                    class="flex items-center justify-center mr-10 cursor-pointer"
                >
                    <img width="130" src="/images/logo.png" alt="" />
                </Link>
            </div>

            <div class="w-[600px] md:block hidden">
                <div class="rounded-full flex items-center bg-[#222222]">
                    <input
                        type="text"
                        class="form-control block w-full px-5 py-1.5 text-base font-normal text-gray-200 bg-black placeholder-gray-400 bg-clip-padding border border-solid border-l-gray-700 border-y-gray-700 rounded-l-full transition ease-in-out m-0 border-transparent focus:ring-0"
                        placeholder="Search Course..."
                    />
                    <MagnifyIcon class="mx-6" fillColor="#FFFFFF" :size="23" />
                </div>
            </div>
            <Dropdown align="right" width="48">
                <template #trigger>
                    <span class="inline-flex rounded-md">
                        <button
                            type="button"
                            class="inline-flex items-center px-3 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-slate-700 hover:text-gray-300 focus:outline-none transition ease-in-out duration-150"
                        >
                            {{ $page.props.auth.user.name }}

                            <div>
                                <img
                                    class="rounded-full ml-2"
                                    width="35"
                                    src="/images/astronaut.png"
                                />
                            </div>
                        </button>
                    </span>
                </template>

                <template #content>
                    <DropdownLink :href="route('profile.edit')">
                        Profile
                    </DropdownLink>
                    <DropdownLink
                        :href="route('logout')"
                        method="post"
                        as="button"
                    >
                        Log Out
                    </DropdownLink>
                </template>
            </Dropdown>
        </div>

        <div v-if="width > 639">
            <div
                v-if="$page.url === '/'"
                id="SideNav"
                :class="[!openSideNav ? 'w-[70px]' : 'w-[240px]']"
                class="h-[100%] fixed z-0 bg-slate-800"
            >
                <ul
                    :class="[!openSideNav ? 'p-2' : 'px-5 pb-2 pt-[7px]']"
                    class="mt-[60px] w-full"
                >
                    <Link :href="route('home')">
                        <SideNavItem
                            :openSideNav="openSideNav"
                            iconString="Home"
                        />
                    </Link>
                    <div class="border-b border-b-gray-700 my-2.5"></div>
                    <SideNavItem
                        :openSideNav="openSideNav"
                        iconString="Courses"
                    />
                    <SideNavItem
                        :openSideNav="openSideNav"
                        iconString="Library"
                    />
                </ul>
            </div>
        </div>

        <!-- OVERLAY NAV SECTION -->
        <div
            @click="openSideNavOverlay = false"
            class="bg-slate-700 bg-opacity-70 fixed z-50 w-full h-screen"
            :class="
                openSideNavOverlay
                    ? 'animate__animated animate__fadeIn animate__faster'
                    : 'hidden z-[-1]'
            "
        />
        <div
            id="SideNavOverlay"
            ref="sideNavOverlay"
            class="h-[100%] fixed z-50 bg-slate-700 mt-[9px] w-[240px]"
            :class="
                openSideNavOverlay
                    ? 'animate__animated animate__slideInLeft animate__faster'
                    : 'animate__animated animate__slideOutLeft animate__faster'
            "
        >
            <div class="flex items-center">
                <button
                    @click="isNavOverlay()"
                    class="p-2 ml-3 rounded-full hover:bg-gray-800 cursor-pointer"
                >
                    <MenuIcon fillColor="#FFFFFF" :size="26" />
                </button>
                <div class="mx-2"></div>
                <Link
                    :href="route('home')"
                    class="flex items-center justify-center cursor-pointer"
                >
                    <img width="130" src="/images/logo.png" alt="" />
                </Link>
            </div>
            <ul class="w-full px-5 py-2 p-2 mt-2">
                <Link :href="route('home')">
                    <SideNavItem :openSideNav="true" iconString="Home" />
                </Link>
                <div class="border-b border-white my-2.5"></div>
                <SideNavItem :openSideNav="true" iconString="Courses" />
                <SideNavItem :openSideNav="true" iconString="Library" />
            </ul>
        </div>
        <!-- OVERLAY NAV SECTION END -->

        <div
            class="w-[100%] h-[calc(100vh-60px)] absolute right-0 top-[60px]"
            :class="{
                'w-[calc(100%-70px)]': !openSideNav,
                'w-[calc(100%-240px)]': openSideNav,
                'w-[100vw] xl:w-[calc(100%-80px)]': $page.url !== '/',
                'w-[100vw]': width < 639,
            }"
        >
            <slot />
        </div>
    </div>
</template>

<style>
body {
    background-color: black;
}
</style>
