import { createApp } from "vue";
import { createPinia } from "pinia";

import App from "./App.vue";
import router from "./router";

import "./assets/base.css";

import mdiVue from "mdi-vue/v3";
import * as mdijs from "@mdi/js";

const app = createApp(App);

app.use(mdiVue, { icons: mdijs });
app.use(createPinia());
app.use(router);

app.mount("#app");
