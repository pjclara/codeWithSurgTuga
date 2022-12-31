<script setup>
import HelloBar from '@/components/main/HelloBar.vue';
</script>

<template>
    <div class="flex flex-col gap-10 p-7">
        <hello-bar />
        <div>
            <routerView></routerView>
        </div>
    </div>
</template>