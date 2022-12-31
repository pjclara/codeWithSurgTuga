<script setup>

import { ref, onMounted, inject, computed } from 'vue'

import { useInternamentoStore } from '../../stores/internamentos.js'
import UtenteForm from '../../components/utente/UtenteForm.vue';

const internamentoStore = useInternamentoStore()

onMounted(() => {
    //if (!internamentoStore.internamentos.length)
        internamentoStore.loadInternamentos()
})


</script>

<template>

    <div class="text-caption" v-if="!internamentoStore.isLoading">
        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Processo</th>
                    <th><span @click="internamentoStore.sortByNome">Nome</span></th>
                    <th>Entrada</th>
                    <th>Motivo de internamento</th>
                    <th>Diagnósticos</th>
                    <th>Responsável</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="internamento in internamentoStore.internamentos" align="center">
                    <td>{{ internamento.cama }}</td>
                    <td>{{ internamento.utente.numero_processo }}</td>
                    <td>{{ internamento.utente.nome }}</td>
                    <td>{{ internamento.data_de_entrada }}</td>
                    <td>{{ internamento.motivo_internamento }}</td>
                    <td>
                        <div v-for="diagnostico in internamento.diagnosticos">{{ diagnostico.abrev }}</div>
                    </td>
                    <td>{{ internamento.responsavel.abrev }}</td>
                    <td>
                        <utente-form :utente="internamento.utente" label="Editar"></utente-form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div v-else>
        loading
    </div>
</template>
