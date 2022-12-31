<template>
    <div>
        <ul>
            <router-link v-for="({ text, icon, name }, index) in items" @click="setActive(index)" :key="index" tag="li"
                active-class="active" :to="{name:name}" exact>
                <li class="p-3 flex justify-start items-center gap-3 cursor-pointer" :class="{
                    'font-bold bg-gradient-to-tl to-pink-200 from-orange-300 rounded-xl text-gray-50': active === index
                }">
                    <mdicon :name="icon" class="text-current"></mdicon>
                    <span>{{ text }}</span>
                </li>
            </router-link>

        </ul>
    </div>
</template>

<script setup>
import { ref } from "vue"

let active = ref(0);

let setActive = (index) => active.value = index

let items = [
    { text: 'Painel', icon: 'home', link: '/', name: "home" },
    { text: 'Diagnósticos', icon: 'chart-arc', link: '/diagnosticos', name: "diagnosticos" },
    { text: 'Procedimentos', icon: 'format-list-checks', link: '/procedimentos', name: "procedimentos" },
    { text: 'Settings', icon: 'cog', link: '/about', name: "about" },
]


</script>