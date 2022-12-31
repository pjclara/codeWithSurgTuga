import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import AboutView from "../views/AboutView.vue";

import InternamentosView from "@/views/internamentos/InternamentosView.vue";
import InternamentosTable from "@/views/internamentos/InternamentosTable.vue";
import InternamentoShow from "@/views/internamentos/InternamentoShow.vue";

import AgendamentosView from '@/views/agendamentos/AgendamentosView.vue'

import DiagnosticosView from "@/views/diagnosticos/DiagnosticosView.vue";
import DiagnosticosTable from "@/views/diagnosticos/DiagnosticosTable.vue";



import LoginView from "@/views/auth/LoginView.vue";
import RouteRedirector from "@/components/global/RouteRedirector.vue";

import { useUserStore } from "@/stores/user.js";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: HomeView,
    },
    {
      path: "/redirect/:redirectTo",
      name: "Redirect",
      component: RouteRedirector,
      props: (route) => ({ redirectTo: route.params.redirectTo }),
    },
    {
      path: "/about",
      name: "about",
      component: AboutView,
    },
    {
      path: "/internamentos",
      component: InternamentosView,
      children: [
        {
          path: "",
          name: "internamentos",
          component: InternamentosTable,
        },
        {
          path: ":id",
          name: "internamento",
          component: InternamentoShow,
        },
      ],
    },
    {
      path: "/diagnosticos",
      component: DiagnosticosView,
      children: [
        {
          path: "",
          name: "diagnosticos",
          component: DiagnosticosTable,
        }
      ],
    },
    {
      path: "/login",
      name: "login",
      component: LoginView,
    },
  ],
});
let handlingFirstRoute = true;

/* router.beforeEach((to, from, next) => {
  if (handlingFirstRoute) {
    handlingFirstRoute = false;
    next({ name: "Redirect", params: { redirectTo: to.fullPath } });
    return;
  } else if (to.name == "Redirect") {
    next();
    return;
  }

  const userStore = useUserStore();
  if (to.name == "login" || to.name == "home") {
    next();
    return;
  }
  if (!userStore.user) {
    next({ name: "login" });
    return;
  }
  if (to.name == "User") {
    if (userStore.user.type == "A" || userStore.user.id == to.params.id) {
      next();
      return;
    }
    next({ name: "home" });
    return;
  }
  next();
}); */
export default router;
