<script setup>
import { useUserStore } from '@/stores/user.js'

const userStore = useUserStore()

</script>
<template>
    <div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item menu-open" v-if="userStore.user">
                    <router-link :to="{ name: 'home' }" class="nav-link" :class="{ active: $route.name === 'home' }">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Home
                        </p>
                    </router-link>
                </li>
                <li class="nav-item menu-open" v-if="userStore.user">
                    <router-link :to="{ name: 'internamentos' }" class="nav-link"
                        :class="{ active: $route.name === 'internamentos' }">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Internamentos
                        </p>
                    </router-link>
                </li>
                <li class="nav-item menu-open" v-if="userStore.user">
                    <router-link :to="{ name: 'about' }" class="nav-link" :class="{ active: $route.name === 'about' }">
                        <i class="nav-icon fas fa-question-circle"></i>
                        <p>
                            About
                        </p>
                    </router-link>
                </li>
                <li class="nav-item menu-open" v-if="userStore.user">
                    <a class="nav-link" @click.prevent="userStore.logout" style="cursor: pointer">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Sair
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open" v-if="!userStore.user">
                    <router-link :to="{ name: 'login' }" class="nav-link" :class="{ active: $route.name === 'login' }">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Entrar
                        </p>
                    </router-link>
                </li>
            </ul>
        </nav>
    </div>
</template>