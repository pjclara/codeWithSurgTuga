<template>
    <div>
        <div class="text-caption" v-if="!agendamentosStore.isLoading">
            <table class="table table-striped d-none d-md-block" >
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Processo</th>
                        <th><span @click="agendamentosStore.sortByNome">Nome</span></th>
                        <th>Entrada</th>
                        <th>Motivo de internamento</th>
                        <th>Diagnósticos</th>
                        <th>Responsável</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="agendamento in agendamentosStore.agendamentos" align="center">
                        <td >{{ agendamento.id }}</td>
                        
                    </tr>
                </tbody>
            </table>

            <div class="d-none">{{agendamentosStore.agendamentos}}</div>
        </div>
    </div>
</template>

<script setup>

import { ref, onMounted, inject, computed } from 'vue'

import { useAgendamentoStore } from '../../stores/agendamentos.js'

const agendamentosStore = useAgendamentoStore()

onMounted(() => {
    agendamentosStore.loadAgendamentos()
})


</script>