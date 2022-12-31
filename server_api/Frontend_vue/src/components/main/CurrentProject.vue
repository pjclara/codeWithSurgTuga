<template>
    <div class="flex flex-col md:flex-row items-center md:items-stretch gap-7">
        <project 
        v-for="project in projects"
         class="w-full rounded-xl p-4" 
         :project="project" />
    </div>
</template>

<script setup> 

import Project from './Project.vue'

const projects = [
    {
        name: 'Vue',
        task: 10,
        percentage: 96,
        people: 3,
        color: "red"
    }, {
        name: 'Web design',
        task: 10,
        percentage: 96,
        people: 3,
        color: "red"
    }]
</script>