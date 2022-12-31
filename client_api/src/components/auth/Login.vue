<script setup>
  import { ref, inject } from 'vue'
  import { useRouter } from 'vue-router'  
  import { useUserStore } from '../../stores/user.js'
  const router = useRouter()  
  const toast = inject('toast')

  const credentials = ref({
        username: '',
        password: ''
    })

  const userStore = useUserStore()     

  const emit = defineEmits(['login'])

  const login = async () => {
    if (await userStore.login(credentials.value)) {
      toast.success('User ' + userStore.user.name + ' has entered the application.')
      emit('login')
      router.back()
    } else {
      credentials.value.password = ''
      toast.error('User credentials are invalid!')
    }
  }
</script>


<template>
  <form
    class="row g-3 needs-validation"
    novalidate
    @submit.prevent="login"
  >
    <hr>
    <div class="mb-3">
      <div class="mb-3">
        <label
          for="inputUsername"
          class="form-label"
        >Utilizador</label>
        <input
          type="text"
          class="form-control"
          id="inputUsername"
          required
          v-model="credentials.username"
        >
      </div>
    </div>
    <div class="mb-3">
      <div class="mb-3">
        <label
          for="inputPassword"
          class="form-label"
        >Senha</label>
        <input
          type="password"
          class="form-control"
          id="inputPassword"
          required
          v-model="credentials.password"
        >
      </div>
    </div>
    <div class="flex mt-8 ml-2 text-white justify-content-center">
      <button
        type="button"
        class="btn btn-primary"
        @click="login"
      >Login</button>
    </div>
  </form>
</template>

