import { ref, computed, inject } from "vue";
import { defineStore } from "pinia";

export const useInternamentoStore = defineStore("internamentos", () => {
  const axios = inject("axios");
  const toast = inject("toast");
  const serverBaseUrl = inject("serverBaseUrl");

  let isLoading = ref(true);

  const internamentos = ref([]);

  async function loadInternamentos() {
    try {
      const response = await axios.get("internamentos");
      internamentos.value = response.data.data.sort((a, b) =>
        a["cama"] < b["cama"] ? -1 : 1
      );
      toast.success("Internamentos carregados com sucesso!");
      isLoading.value = false;
      return internamentos.value;
    } catch (error) {
      clearInternamentos();
      throw error;
    }
  }

  function sortByNome(prop) {
    return internamentos.value.sort((a, b) => (a["utente"]["nome"] < b["utente"]["nome"] ? -1 : 1));
  }

  function getInternamento(id) {
    return internamentos.value.filter(
      (internamentos) => internamentos.id == id
    )[0];
  }

  function clearInternamentos() {
    internamentos.value = [];
  }

  return {
    internamentos,
    loadInternamentos,
    clearInternamentos,
    getInternamento,
    isLoading,
    sortByNome
  };
});
