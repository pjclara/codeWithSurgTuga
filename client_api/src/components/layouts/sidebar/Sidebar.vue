<script setup>
import { useUserStore } from '@/stores/user.js'
import SidebarMenu from './SidebarMenu.vue';

const userStore = useUserStore()

</script>
<template>
    <div>
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/public/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                        alt="User Image" />
                </div>
                <div class="info">
                    <router-link :to="{ name: 'home' }" class="d-block">{{ userStore.user?.name }}
                    </router-link>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                        aria-label="Search" />
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <SidebarMenu></SidebarMenu>
            <!-- /.sidebar-menu -->
        </div>
    </div>
</template>