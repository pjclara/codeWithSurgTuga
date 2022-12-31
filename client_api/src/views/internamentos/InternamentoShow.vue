<script setup>

import { useRoute } from 'vue-router'
import { useInternamentoStore } from '../../stores/internamentos.js'
import { onMounted } from 'vue';

const internamentoStore = useInternamentoStore()

const route = useRoute()

let internamento = internamentoStore.getInternamento(route.params.id)



</script>

<template>
    <div>
        <v-container>
            <v-row justify="space-between" align="center">
                <v-col cols="8">
                    <v-sheet class="pa-2 ma-2">
                        {{ internamento }}
                    </v-sheet>
                </v-col>
                <v-col cols="4">
                    <router-link :to="{ name: 'internamentos' }">
                        <v-btn>Voltar à lista de internamento</v-btn>
                    </router-link>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>