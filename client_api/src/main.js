import { createApp } from "vue";
import { createPinia } from "pinia";

import App from "./App.vue";
import router from "./router";
import axios from "axios";
import Toaster from "@meforma/vue-toaster";

import '@mdi/font/css/materialdesignicons.css'

//import './assets/main.css'

// Vuetify
import "vuetify/styles";
import { createVuetify } from "vuetify";
import * as components from "vuetify/components";
import * as directives from "vuetify/directives";

const vuetify = createVuetify({
  components,
  directives,
});

const app = createApp(App);

const serverBaseUrl = "http://127.0.0.1:8000";

app.provide(
  "axios",
  axios.create({
    baseURL: serverBaseUrl + "/api",
    headers: {
      "Content-type": "application/json",
    },
  })
);

app.use(Toaster, {
  // Global/Default options
  position: "top",
  timeout: 1000,
  pauseOnHover: true,
});
app.provide("toast", app.config.globalProperties.$toast);

app.provide("serverBaseUrl", serverBaseUrl);

app.use(createPinia());
app.use(router);
app.use(vuetify);
app.mount("#app");
