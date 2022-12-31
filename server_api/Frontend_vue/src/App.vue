<script setup>
import NavBar from './components/navigation/NavBar.vue'
import MainContent from './components/main/MainContent.vue'
import SideBar from './components/sideBar/SideBar.vue'
</script>
<template>
  <div class="grid grid-cols-12 gap-2 h-screen">
    <div class="col-span-12 lg:col-span-10 bg-stone-50 md:divide-x-2 flex gap-2 flex-col lg:flex-row">
      <div class="lg:w-[250px] w-full lg:h-full overflow-hidden">
        <nav-bar />
      </div>
      <main-content class="flex-1" />
    </div>
    <div class="col-span-12 lg:col-span-2 xl:block">
      <side-bar class="p-2" />
    </div>
  </div>
</template>

