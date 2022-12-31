<script setup>
import InputText from '@/components/global/InputText.vue'
import { ref, watch } from 'vue';
import { useDiagnosticoStore } from '@/stores/diagnostico';

const { toogleFavorito, updateDescricao } = useDiagnosticoStore()

let props = defineProps({
    diagnostico: Object,
});

let descricao = ref(
    props.diagnostico.descricao_personalizada ?? null
);


</script>

<template>
    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
        <th scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ diagnostico.codigo }}
        </th>
        <td class="py-2 px-6">
            {{ diagnostico.descricao_longa }}<br>
            <span class="text-xs italic">
                <InputText v-model:field="descricao" @update="updateDescricao(descricao, diagnostico.id)" />
            </span>

        </td>
        <td class="py-2 px-6">
            <mdicon class="cursor-pointer" :name="diagnostico.favorito ? 'star' : 'star-outline'"
                @click="toogleFavorito(diagnostico.id)" />
        </td>
        <td class="py-2 px-6">
            <div v-for="tag in diagnostico.tags"
                class="inline-block p-1 m-1 rounded-lg border text-green-700 text-[8px] lg:text-[10px] hover:bg-green-500 hover:text-white border-green-700"
                style="cursor: pointer" :key="tag">
                {{ tag.nome }}
            </div>
        </td>
    </tr>

</template>