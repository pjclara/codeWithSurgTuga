<script setup>
import { ref } from 'vue';
import EditUtente from '../../components/utente/EditUtente.vue';

let prop = defineProps(['utente', 'label'])

let dialog = ref(false)

</script>
<template>
    <div class="text-center">
        <v-dialog v-model="dialog">
            <template v-slot:activator="{ props }">
                <v-btn color="success" size="x-small" v-bind="props">
                    {{ label }}
                </v-btn>
            </template>
            <v-card>
                <v-card-title>
                    <h3>{{ label }} Utente</h3>
                </v-card-title>
                <v-card-text>
                    <edit-utente :utente="prop.utente"></edit-utente>
                </v-card-text>
                <v-card-actions>
                    <v-row align="start">
                        <v-col>
                            <v-btn color="success" block @click="dialog = false">Guardar e fechar</v-btn>
                        </v-col>
                        <v-col>
                            <v-btn color="primary" block @click="dialog = false">Sair sem Guardar</v-btn>
                        </v-col>
                    </v-row>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>

