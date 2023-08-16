<template>
    <div class="relative">
        <div
            @mouseover="show = true"
            @mouseleave="show = false"
            class="rounded-lg bg-gray-800 ms-2"
            :class="[
                show && width > 639
                    ? 'absolute z-30 transition ease-in-out delay-150 hover:translate-y-8 hover:scale-125 hover:bg-gray-600 duration-300'
                    : '',
            ]"
        >
            <div>
                <img
                    :class="
                        show
                            ? 'transition ease-in-out delay-150 rounded-lg'
                            : 'rounded-lg'
                    "
                    :src="thumbnail || ''"
                    class="aspect-video cursor-pointer"
                />
                <div
                    class="w-full h-full aspect-video cursor-pointer delay-350 hidden"
                ></div>
            </div>

            <div>
                <div class="flex mt-1.5">
                    <div>
                        <img
                            class="rounded-full m-1.5 mt-2 flex items-baseline w-8 h-8"
                            :src="image || ''"
                        />
                    </div>
                    <div class="px-1.5 text-white mt-1">
                        <div
                            class="text-[17px] font-extrabold w-full cursor-pointer"
                        >
                            {{ title.substring(0, 100) }}
                        </div>
                        <div
                            class="text-[14px] text-gray-300 font-extrabold flex gap-1 items-center cursor-pointer"
                        >
                            {{ instructor.substring(0, 30) }}
                            <Star fillColor="#FFD700" :size="17" />
                            <Star fillColor="#FFD700" :size="17" />
                            <Star fillColor="#FFD700" :size="17" />
                            <Star fillColor="#FFD700" :size="17" />
                            <StarHalfFull fillColor="#FFD700" :size="17" />
                        </div>
                        <div class="text-sm mb-1 mt-2 text-gray-200">
                            <span
                                class="text-gray-400 line-through"
                                v-if="orig_price > current_price"
                                >Php {{ orig_price }}</span
                            >
                            Php {{ current_price }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps, toRefs, ref, watch, onMounted } from "vue";
import Star from "vue-material-design-icons/Star.vue";
import StarHalfFull from "vue-material-design-icons/StarHalfFull.vue";

const props = defineProps({
    title: String,
    instructor: String,
    image: String,
    thumbnail: String,
    rating: String,
    overview: String,
    current_price: String,
    orig_price: String,
});

const {
    title,
    instructor,
    image,
    thumbnail,
    rating,
    current_price,
    orig_price,
} = toRefs(props);

let show = ref(false);
let width = ref(document.documentElement.clientWidth);
</script>
