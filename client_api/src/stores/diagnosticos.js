import { defineStore } from "pinia";
import axios from "axios";
import { useTagStore } from "@/stores/tag";
import { ref } from "vue";

export const useDiagnosticoStore = defineStore({
    id: "diagnostico",
    state: () => ({
        diagnosticos: [],
        diagnostico: null,
        loading: false,
        error: null,
        searchId: "",
        searchDesc: "",
        tags: useTagStore(),
        favoritos: "",
        isLoading : ref(false)
    }),

    actions: {
        async fetchDiagnosticos() {
            this.diagnosticos = [];
            this.loading = true;
            try {
                let response = await axios.get(
                    "http://127.0.0.1:8000/api/diagnosticos?searchId=" +
                        this.searchId +
                        "&searchDesc=" +
                        this.searchDesc +
                        "&tags=" +
                        this.tags.selectTags +
                        "&favoritos=" +
                        this.favoritos
                );
                this.diagnosticos = response.data.data;
            } catch (error) {
                console.log(error);
                this.error = error;
            } finally {
                this.loading = false;
            }
        },
        async toogleFavorito(id) {
            try {
                let response = await axios.put(
                    "http://127.0.0.1:8000/api/diagnosticos/" +
                        id +
                        "/toogleFavorito"
                );
                this.diagnosticos.filter((diagnostico) => {
                    if (diagnostico.id == id)
                        diagnostico.favorito = !diagnostico.favorito;
                });
            } catch (error) {}
        },
        async updateDescricao(descricao, id) {
            try {
                let response = await axios.put(
                    "http://127.0.0.1:8000/api/diagnosticos/" + id,
                    { descricao_personalizada: descricao }
                );
                console.log(response);
            } catch (error) {}
        },
    },
});
