<template>
    <div>
        <form @submit.prevent="handleLogin" class=" mx-auto mt-10 w-1/2 min-w-100 p-4">
            <h1 class="text-2xl font-bold mb-6">Login Page</h1>
            <input v-model="formData.email" autocomplete="email" type="email" placeholder="email" class="input input-primary w-full mb-4" />
            <input v-model="formData.password" autocomplete="current-password"  type="password" placeholder="password" class="input input-primary w-full mb-4" />
            <button class="btn btn-primary w-full">Login </button>
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


const config = useRuntimeConfig()
const client = useSanctumClient()



const handleLogin = async () => {
    await login(formData.value)
}

</script>

<style  scoped>

</style>