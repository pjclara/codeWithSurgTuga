<template>
    <div class="rounded-xl bg-gray-500 text-white p-4 flex justify-between flex-col gap-7">
        <div class="flex justify-between items-center">
            <div class="flex -space-x-2">
                {{project.name}}
            </div>

        </div>
    </div>
</template>

<script setup>

defineProps({
    project: {
        type: Object,
        required: true
    }
})


</script>