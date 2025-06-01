<template>
    <div>
        <form @submit.prevent="handleLogin" class=" mx-auto mt-10 w-1/2 min-w-100 p-4">
            <h1 class="text-2xl font-bold mb-6">Login Page</h1>
            <p v-if="errors.user" class="mb-2 text-sm text-red-300">{{ errors.user[0] }}</p>
            <p v-if="errors.email" class="mb-2 text-sm text-red-300">{{ errors.email[0] }}</p>
            <input v-model="formData.email" autocomplete="email" type="email" placeholder="email" class="input input-primary w-full mb-4" />
            <p v-if="errors.password" class="mb-2 text-sm text-red-300">{{ errors.password[0] }}</p>
            <input v-model="formData.password" autocomplete="current-password"  type="password" placeholder="password" class="input input-primary w-full mb-4" />
            <button class="btn btn-primary w-full">Login </button>
            <p class="text-center mt-5"> forgot password? <NuxtLink to="/forgot-password"  class="underline hover:text-blue-900 cursor-pointer"> reset password </NuxtLink></p>
        </form>

    </div>
</template>

<script setup>

const {login, user} = useSanctumAuth()

const formData = ref({
    email: '',
    password: '',
})

definePageMeta({
    layout: 'auth',
    middleware: 'sanctum:guest'
})

useHead({
    title: 'login'
})

const config = useRuntimeConfig()
const client = useSanctumClient()

const errors = ref({})



const handleLogin = async () => {
    try{

        await login(formData.value)
    }catch(err){
        errors.value = err.response._data.errors
    }
}

</script>

<style  scoped>

</style>