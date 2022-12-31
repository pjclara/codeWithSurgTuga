<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Painel inicial</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Painel inicial</li>
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
  <div>
    Painel inicial

    <v-container class="bg-surface-variant">
      <v-row no-gutters justify="space-around">
        <v-col cols="12" sm="2" >
          <div class="text-caption text-grey">
            Nome
          </div>
          <div>Me</div>
        </v-col>
        <v-col cols="12" sm="6">
          <v-sheet class="ma-2 pa-2">
            One of three columns
          </v-sheet>
        </v-col>

      </v-row>
    </v-container>


  </div>

</template>
