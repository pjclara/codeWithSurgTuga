import { ref, computed, inject } from "vue";
import { defineStore } from "pinia";
export const useUserStore = defineStore("user", () => {
  const axios = inject("axios");
  const toast = inject("toast");
  const serverBaseUrl = inject("serverBaseUrl");

  const user = ref(null);

  async function loadUser() {
    try {
      const response = await axios.get("users/me");
      user.value = response.data.data;
    } catch (error) {
      clearUser();
      throw error;
    }
  }
  function clearUser() {
    delete axios.defaults.headers.common.Authorization;
    user.value = null;
  }

  async function login(credentials) {
    try {
      const response = await axios.post("login", credentials);
      axios.defaults.headers.common.Authorization =
        "Bearer " + response.data.access_token;
      sessionStorage.setItem("token", response.data.access_token);
      await loadUser();
      return true;
    } catch (error) {
      clearUser();
      return false;
    }
  }

  async function logout() {
    try {
      await axios.post("logout");
      clearUser();
      toast.success("User has logged out of the application.");
      delete axios.defaults.headers.common.Authorization;
      router.push({ name: "login" });
      return true;
    } catch (error) {
      return false;
    }
  }

  async function restoreToken() {
    let storedToken = sessionStorage.getItem("token");
    if (storedToken) {
      axios.defaults.headers.common.Authorization = "Bearer " + storedToken;
      await loadUser();
      return true;
    }
    clearUser();
    return false;
  }

  return { user, loadUser, clearUser, login, logout, restoreToken };
});
