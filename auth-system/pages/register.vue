<template>
    <div>
        <form @submit.prevent="handleRegister" class=" mx-auto mt-10 w-1/2 min-w-100 p-4">
            <h1 class="text-2xl font-bold mb-6">Register Page</h1>
            <input type="name" autocomplete="name" v-model="formData.name" placeholder="name" class="input input-primary w-full mb-4" />
            <input type="email" autocomplete="email" v-model="formData.email" placeholder="email" class="input input-primary w-full mb-4" />
            <input type="password" autocomplete="new-password" v-model="formData.password" placeholder="password" class="input input-primary w-full mb-4" />
            <input type="password" autocomplete="new-password" v-model="formData.password_confirmation" placeholder="password confirmation" class="input input-primary w-full mb-4" />
            <button class="btn btn-primary w-full">Register </button>
        </form>

    </div>
</template>

<script setup>

const {login} = useSanctumAuth()

const client = useSanctumClient()

const config = useRuntimeConfig()


const formData = ref({
    email: '',
    name: '',
    password_confirmation: '',
    password: '',
})

definePageMeta({
    layout: 'auth',
    middleware: 'sanctum:guest'
})

const handleRegister = async () => {
    
    await client(`${config.public.baseUrl}/api/register`, {
        method: 'POST',
        body: JSON.stringify(formData.value)
    })



    await login(formData.value)
}

</script>

<style  scoped>

</style>