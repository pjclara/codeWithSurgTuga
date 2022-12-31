<template>
    <div class="flex flex-col md:flex-row gap-10 justify-between items-center">
        <div class="space-y-2">
            <h1 class="font-extrabold text-5xl text-gray-600-700">Hello, Sara</h1>
            <p class="font-bold text-gray-500">{{message}}</p>
        </div>
    </div>
</template>

<script setup>
import { computed } from '@vue/reactivity';
import { watch } from 'vue';

const message = new Date().toLocaleString()

</script>
