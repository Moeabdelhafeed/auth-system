<template>
    <div>
         <form @submit.prevent="handleForgot" class=" mx-auto mt-10 w-1/2 min-w-100 p-4">
            <h1 class="text-2xl font-bold mb-6">Forgot Password Page</h1>
            <input v-model="email" autocomplete="email" type="email" placeholder="email" class="input input-primary w-full mb-4" />
            <button class="btn btn-primary w-full">Send Reset Link </button>
        </form>
    </div>
</template>

<script setup>

definePageMeta({
    layout: 'auth',
    middleware: 'sanctum:guest'
})


const email = ref('')

const config = useRuntimeConfig();
const client = useSanctumClient();


const handleForgot = async () =>{
    await client(`${config.public.baseUrl}/api/password/email`, {
        method: 'POST',
        body:{
            email: email.value
        }
    })  
}

</script>

<style scoped>

</style>