<template>
    <div>
         <form @submit.prevent="handleForgot" class=" mx-auto mt-10 w-1/2 min-w-100 p-4">
            <h1 class="text-2xl font-bold mb-6">Forgot Password Page</h1>
           <p v-if="errors.email" class="mb-2 text-sm text-red-300">{{ errors.email[0] }}</p>
           <p v-if="success" class="mb-2 text-sm text-green-300">Your Reset Email is sent</p>
            <input v-model="email" autocomplete="email" type="email" placeholder="email" class="input input-primary w-full mb-4" />
            <button  class="btn btn-primary w-full">Send Reset Link </button>
        </form>
    </div>
</template>

<script setup>

definePageMeta({
    layout: 'auth',
    middleware: 'sanctum:guest'
})

useHead({
    title: 'forgot password'
})

const errors = ref({})

const success = ref(false)

const email = ref('')

const config = useRuntimeConfig();
const client = useSanctumClient();


const handleForgot = async () =>{
    try{

        await client(`${config.public.baseUrl}/api/password/email`, {
            method: 'POST',
            body:{
                email: email.value
            }
        })  

        success.value = true

        setTimeout(() => {
            success.value = false
        } ,400)
    }catch (err){
        errors.value = err.response._data.errors
    }
}

</script>

<style scoped>

</style>