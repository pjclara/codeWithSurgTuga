import { ref, inject } from "vue";
import { defineStore } from "pinia";

export const useAgendamentoStore = defineStore("agendamentos", () => {
  const axios = inject("axios");
  const toast = inject("toast");
  const serverBaseUrl = inject("serverBaseUrl");

  let isLoading = ref(true);

  let agendamentos = ref([]);

  async function loadAgendamentos() {
    try {
      const response = await axios.get("agendamentos");
      agendamentos.value = response.data.data
      toast.success("Agendamentos carregados com sucesso!");
      isLoading.value = false;
      return agendamentos.value;
    } catch (error) {
      clearAgendamentos();
      throw error;
    }
  }

  function sortByNome(prop) {
    //return Agendamentos.value.sort((a, b) => (a["utente"]["nome"] < b["utente"]["nome"] ? -1 : 1));
  }

  function getAgendamento(id) {
    return agendamentos.value.filter(
      (Agendamentos) => Agendamentos.id == id
    )[0];
  }

  function clearAgendamentos() {
    agendamentos.value = [];
  }

  return {
    agendamentos,
    loadAgendamentos,
    clearAgendamentos,
    getAgendamento,
    isLoading,
    sortByNome
  };
});
