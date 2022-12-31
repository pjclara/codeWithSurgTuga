<script setup>
import { onMounted, ref } from 'vue';

import DataInput from '../global/forms/DateInput.vue'
import { useUtenteStore } from '../../stores/utentes'

let prop = defineProps(['utente', 'label'])

const utenteStore = useUtenteStore()

let utente = prop.utente


onMounted(() => {
    if (utenteStore.concelhos.length == 0)
        utenteStore.loadConcelhos()
    if (utenteStore.estadoCivils.length == 0)
        utenteStore.loadEstadoCivils()

    if (utenteStore.classeSocials.length == 0)
        utenteStore.loadClasseSocials()
})


</script>
<template>
    <div>
        <v-form>
            <v-row>
                <v-col cols="12" md="4"><v-text-field label="Nome" v-model="prop.utente.nome"></v-text-field></v-col>
                <v-col cols="12" md="2"><v-text-field label="Nº processo"
                        v-model="prop.utente.numero_processo"></v-text-field></v-col>
                <v-col cols="12" md="2"><v-text-field label="Nº utente"
                        v-model="prop.utente.numero_utente"></v-text-field></v-col>
                <v-col cols="12" md="2">
                    <DataInput label-value="Data de nascimento" v-model="utente.data_nascimento">
                    </DataInput>
                </v-col>
                <v-col cols="12" md="2"><v-select label="Sexo"
                        :items="[{ nome: 'Masculino', value: 1 }, { nome: 'Feminino', value: 2 }, { nome: 'Desconhecido', value: 3 }]"
                        item-title="nome" item-value="value" v-model="prop.utente.sexo_id"></v-select></v-col>
            </v-row>
            <v-row>
                <v-col cols="12" md="3"><v-select label="Concelho" :items="utenteStore.concelhos" item-title="nome"
                        item-value="id" v-model="prop.utente.concelho_id"></v-select></v-col>
                <v-col cols="12" md="3"><v-select label="Etnia" :items="utenteStore.concelhos" item-title="nome"
                        item-value="id" v-model="prop.utente.concelho_id"></v-select></v-col>
                <v-col cols="12" md="3"><v-select label="Estado civil" :items="utenteStore.estadoCivils"
                        item-title="nome" item-value="id" v-model="prop.utente.estado_civil_id"></v-select></v-col>
                <v-col cols="12" md="3"><v-select label="Classe Social" :items="utenteStore.classeSocials"
                        item-title="nome" item-value="id" v-model="prop.utente.classe_social_id"></v-select></v-col>
            </v-row>
        </v-form>
    </div>
</template>

