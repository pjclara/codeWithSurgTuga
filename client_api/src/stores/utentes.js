import { ref, inject } from "vue";
import { defineStore } from "pinia";

export const useUtenteStore = defineStore("utentes", () => {
  const axios = inject("axios");
  const toast = inject("toast");
  const serverBaseUrl = inject("serverBaseUrl");

  let isLoading = ref(true);

  const utentes = ref([]);
  const concelhos = ref([]);
  const estadoCivils = ref([]);
  const classeSocials = ref([]);

  async function loadUtentes() {
    try {
      const response = await axios.get("utentes");
      utentes.value = response.data.data.sort((a, b) =>
        a["nome"] < b["nome"] ? -1 : 1
      );
      toast.success("Utentes carregados com sucesso!");
      isLoading.value = false;
      return utentes.value;
    } catch (error) {
      clearUtentes();
      throw error;
    }
  }

  function clearUtentes() {
    utentes.value = [];
  }

  async function loadConcelhos() {
    try {
      const response = await axios.get("concelhos");
      concelhos.value = response.data;
      toast.success("Concelhos carregados com sucesso!");
      isLoading.value = false;
      return concelhos.value;
    } catch (error) {
      clearConcelhos();
      throw error;
    }
  }

  function clearConcelhos() {
    concelhos.value = [];
  }

  async function loadEstadoCivils() {
    try {
      const response = await axios.get("estadoCivils");
      estadoCivils.value = response.data.data;
      toast.success("estadoCivils carregados com sucesso!");
      isLoading.value = false;
      return estadoCivils.value;
    } catch (error) {
      clearEstadoCivils();
      throw error;
    }
  }

  function clearEstadoCivils() {
    estadoCivils.value = [];
  }

  async function loadClasseSocials() {
    try {
      const response = await axios.get("classeSocials");
      classeSocials.value = response.data.data;
      toast.success("classeSocials carregados com sucesso!");
      isLoading.value = false;
      return classeSocials.value;
    } catch (error) {
      clearClasseSocial();
      throw error;
    }
  }

  function clearClasseSocial() {
    classeSocials.value = [];
  }

  return {
    utentes,
    loadUtentes,
    clearUtentes,
    isLoading,
    loadConcelhos,
    concelhos,
    loadEstadoCivils,
    estadoCivils,
    loadClasseSocials,
    classeSocials,
  };
});
