<script setup>
import { nextTick, ref, watch, defineProps, defineEmits, onMounted } from "vue";

let props = defineProps(["field"]);

let emit = defineEmits(["update:field", "update"]);

const input = ref(null);

onMounted(() => {
    if (inputing.value.hasAttribute("autofocus")) {
        inputing.value.focus();
    }
});

const spaning = ref();
const inputing = ref();
const isEditing = ref(false);

watch(
    () => props.field,
    async () => {
        await nextTick();
        resize();
    }
);

async function edit() {
    isEditing.value = true;
    await nextTick();
    inputing.value.select();
    resize();
}

function resize() {
    inputing.value.style.width = `${spaning.value.offsetWidth + 20}px`;
}

function onSubmit() {
    isEditing.value = false;
    emit("update");
}
</script>

<template>
    <div class="flex flex-col max-w-full" @click="edit()">
        <span
            :class="[isEditing ? 'absolute -left-[1000em]' : '']"
            ref="spaning"
            class="italic text-xs break-all"
        >
            {{ props.field ?? "...." }}<slot></slot>
        </span>
        <form
            v-show="isEditing"
            @submit.prevent="onSubmit()"
            @focusout="onSubmit()"
            class="w-full"
        >
            <input
                :value="field"
                @input="$emit('update:field', $event.target.value)"
                ref="inputing"
                type="text"
                class="max-w-full p-0 pl-1 text-xs italic rounded-md focus:ring-2 hover:ring-blue-800"
            />
        </form>
        
    </div>
</template>

