<script setup>
import InputText from '@/components/global/InputText.vue'
import { ref } from 'vue';
import { useProcedimentoStore } from '@/stores/Procedimento';

const { toogleFavorito, updateDescricao } = useProcedimentoStore()

let props = defineProps({
    procedimento: Object,
});

let descricao = ref(
    props.procedimento.descricao_personalizada ?? null
);

</script>

<template>
    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
        <th scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ procedimento.codigo }}
        </th>
        <td class="py-2 px-6">
            {{ procedimento.descricao_longa }}<br>
            <span class="text-xs italic">
                <InputText v-model:field="descricao" @update="updateDescricao(descricao, procedimento.id)" />
            </span>

        </td>
        <td class="py-2 px-6">
            <mdicon class="cursor-pointer" :name="procedimento.favorito ? 'star' : 'star-outline'"
                @click="toogleFavorito(procedimento.id)" />
        </td>
        <td class="py-2 px-6">
            <div v-for="tag in procedimento.tags"
                class="inline-block p-1 m-1 rounded-lg border text-green-700 text-[8px] lg:text-[10px] hover:bg-green-500 hover:text-white border-green-700"
                style="cursor: pointer" :key="tag">
                {{ tag.nome }}
            </div>
        </td>
    </tr>

</template>