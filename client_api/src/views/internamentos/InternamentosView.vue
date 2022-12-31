<template>
    <div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0 text-uppercase">Área de internamento</h5>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <router-link :to="{ name: 'home' }">Página inicial</router-link>
                            </li>
                            <li class="breadcrumb-item active">Área de internamento</li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <router-view></router-view>
        <!-- /.content-main -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark p-3">
            <!-- Control sidebar content goes here -->
            Lista de internamentos pendentes

        </aside>
        <!-- /.control-sidebar -->
    </div>
</template>
