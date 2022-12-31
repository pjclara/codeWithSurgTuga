import { defineStore } from "pinia";
import axios from "axios";

export const useTagStore = defineStore({
  id: "tag",
  state: () => ({
    tags:[],
    selectTags:[]
  }),

  actions: {
    async fetchTags() {
      this.tags = [];
      try {
        this.tags = await axios
          .get("http://localhost/codex_api/public/api/tags")
          .then((response) => response.data.data);
      } catch (error) {
        console.log(error);
        this.error = error;
      } finally {
      }
    },

  },
});
