<script setup>

import { storeToRefs } from 'pinia';
import { watch } from 'vue';
import { useDiagnosticoStore } from '@/stores/diagnosticos.js';
import RowOfTable from '../../components/diagnosticos/RowOfTable.vue';

const { diagnosticos, loading, isLoading, searchId, searchDesc, favoritos } = storeToRefs(useDiagnosticoStore())
const { fetchDiagnosticos } = useDiagnosticoStore()

let searchBy = () => {
    fetchDiagnosticos()
}

let toogleFavoritos = () => {
    if (favoritos.value) {
        favoritos.value = ""
    } else {
        favoritos.value = true
    }
    fetchDiagnosticos()
}

watch(searchId, () => {
    if (!searchId.value)
        fetchDiagnosticos()
})

watch(searchDesc, () => {
    if (!searchDesc.value)
        fetchDiagnosticos()
})

</script>

<template>
    <div class="p-3">
        <v-container>
            <v-row no-gutters justify="space-around">
                <v-col cols="12" sm="5">
                    <v-text-field v-model="searchId" @keyup.enter="searchBy"
                        placeholder="Procurar diagnosticos pelo código"></v-text-field>
                </v-col>
                <v-col cols="12" sm="5">
                    <v-text-field v-model="searchDesc" @keyup.enter="searchBy"
                        placeholder="Procurar diagnosticos pelo nome"></v-text-field>
                </v-col>
                <v-col cols="12" sm="2" class="d-flex justify-center">
                    <v-btn color="primary" @click="searchBy">Procurar</v-btn>
                </v-col>
            </v-row>
        </v-container>

        <v-container>
            <v-row v-if="loading">
                <v-col cols="12">loading</v-col>
            </v-row>
            <v-row v-else>
                <v-col cols="12">
                    <v-table>
                        <thead>
                            <tr>
                                <th class="text-center">
                                    Código
                                </th>
                                <th class="text-left">
                                    Diagnóstico
                                </th>
                                <th class="text-center">
                                    Favoritos <v-icon class="h-10 relative p-2 bg-red rounded-xl" icon="mdi-star"
                                        @click="toogleFavoritos" />
                                </th>
                                <th class="text-center">
                                    Etiquetas
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <RowOfTable v-for="diagnostico in diagnosticos" :key="diagnostico.id"
                                :diagnostico="diagnostico" />
                        </tbody>
                    </v-table>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>
