<script setup>

import { ref } from 'vue';
import NavBarMenu from './NavBarMenu.vue'

const MOBILE_BREAKPOINT = 1024;

const width = ref(document.body.offsetWidth)

const menuIsActive = ref(width.value > MOBILE_BREAKPOINT)

const toogleMenu = () => menuIsActive.value = !menuIsActive.value

window.addEventListener("resize", () => {
    width.value = document.body.offsetWidth
    menuIsActive.value = width.value > MOBILE_BREAKPOINT
})
</script>

<template>
    <div class="lg:space-y-10 lg:block relative p-2 grid grid-cols-12 h-full">
        <div class="col-span-6 flex justify-center items-center gap-4">
            <div class="rounded-xl p-2 text-white">
                <img src="@/assets/images/logo.png" alt="me"
                    class="w-10 h-10">
            </div>
            <strong>Code with ...</strong>
        </div>
        <div class="lg:hidden col-span-6 flex justify-end items-center">
            <button class="bg-stone-300 p-2 rounded-lg" @click="toogleMenu(menuIsActive)">
                <mdicon name="menu" />
            </button>
        </div>
        <div class="col-span-12 hidden lg:block">
            <div class="relative w-full h-24 flex flex-col items-center gap-4">
                <img src="@/assets/images/user.jpg" alt="me"
                    class="w-24 h-24">
                
            </div>
            <div class="text-center mt-7">
                <h1 class="font-bold text-black">Paulo Clara</h1>
            </div>
        </div>
        <div class="col-span-12 p-10" v-if="menuIsActive">
            <nav-bar-menu />
        </div>
       
    </div>

</template>