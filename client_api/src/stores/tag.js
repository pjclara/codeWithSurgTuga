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
          .get("http://127.0.0.1:8000/api/tags")
          .then((response) => response.data.data);
      } catch (error) {
        console.log(error);
        this.error = error;
      } finally {
      }
    },

  },
});
