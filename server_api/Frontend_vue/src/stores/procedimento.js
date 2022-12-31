import { defineStore } from "pinia";
import axios from "axios";
import { useTagStore } from "@/stores/tag";

export const useProcedimentoStore = defineStore({
  id: "procedimento",
  state: () => ({
    procedimentos: [],
    procedimento: null,
    loading: false,
    error: null,
    searchId: "",
    searchDesc: "",
    tags: useTagStore(),
    favoritos: "",
  }),

  actions: {
    async fetchProcedimentos() {
      this.procedimentos = [];
      this.loading = true;
      try {
        let response = (this.procedimentos = await axios.get(
          "http://localhost/codex_api/public/api/procedimentos?searchId=" +
            this.searchId +
            "&searchDesc=" +
            this.searchDesc +
            "&tags=" +
            this.tags.selectTags +
            "&favoritos=" +
            this.favoritos
        ));
        this.procedimentos = response.data.data;
      } catch (error) {
        console.log(error);
        this.error = error;
      } finally {
        this.loading = false;
      }
    },
    async toogleFavorito(id) {
      console.log(id);
      try {
        let response = await axios.put(
          "http://localhost/codex_api/public/api/procedimentos/" + id + "/toogleFavorito"
        );
        this.procedimentos.filter((procedimento) => {
          if (procedimento.id == id)
            procedimento.favorito = !procedimento.favorito;
        });
      } catch (error) {}
    },
    async updateDescricao(descricao, id) {
      try {
        let response = await axios.put(
          "http://localhost/codex_api/public/api/procedimentos/" + id,
          { descricao_personalizada: descricao }
        );
      } catch (error) {}
    },
  },
});
