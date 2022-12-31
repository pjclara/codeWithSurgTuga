<script setup>

import { storeToRefs } from 'pinia';
import { onMounted, watch, ref } from 'vue';
import { useTagStore } from '@/stores/tag';

import { useDiagnosticoStore } from '@/stores/diagnostico';

const { tags, selectTags } = storeToRefs(useTagStore())
const { fetchTags } = useTagStore()
const { fetchDiagnosticos } = useDiagnosticoStore()
const { favoritos } = storeToRefs(useDiagnosticoStore())

onMounted(() => {
    fetchTags()
})

let selectTagsT = ref([])

let toogle = (id) => {
    if (selectTags.value.includes(id))
        selectTags.value.splice(selectTags.value.indexOf(id), 1);
    else
        selectTags.value.push(id)
    fetchDiagnosticos()

}

watch(selectTags.value, () => {
    selectTagsT.value = selectTags.value
})

let toogleFavoritos = () => {
    if (favoritos.value) {
        favoritos.value = ""
    } else {
        favoritos.value = true
    }
    fetchDiagnosticos()
}

</script>
<template>
    <div class="space-y-5">
        <div class="flex justify-between items-center">
            <h3 class="text-xl font-bold">Etiquetas</h3>
            <button class="h-10 relative p-2 bg-white rounded-xl" @click="toogleFavoritos">
                <mdicon name="star" />
            </button>
        </div>
        <div>
            <ul>
                <li v-for="tag in tags" :key="tag.id" @click="toogle(tag.id)"
                    class="flex relative justify-between bg-white p-2 rounded-xl font-semibold mb-2 cursor-pointer text-xs"
                    :class="{ 'bg-red-500': selectTagsT.includes(tag.id) }">
                    <span>{{ tag.nome }}</span>
                    <span class="text-xs">({{ tag.diagnosticos_count }})</span>
                </li>
            </ul>
        </div>
    </div>

</template>