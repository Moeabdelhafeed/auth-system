<template>
    <div>
         <form @submit.prevent="handleReset" class=" mx-auto mt-10 w-1/2 min-w-100 p-4">
            <h1 class="text-2xl font-bold mb-6">Reset Password Page</h1>
            <input v-model="formData.password" autocomplete="new-password" type="password" placeholder="new password" class="input input-primary w-full mb-4" />
            <input v-model="formData.password_confirmation" autocomplete="new-password" type="password" placeholder="confirm new password" class="input input-primary w-full mb-4" />
            <button class="btn btn-primary w-full">Reset Password </button>
        </form>
    </div>
</template>

<script setup>

definePageMeta({
    layout: 'auth',
    middleware: ['sanctum:guest', 'reset']
})

const route = useRoute()
const router = useRouter()

const formData = ref({
    password: '',
    password_confirmation: '',
    email : route.query.email,
    token: route.query.token
})




const config = useRuntimeConfig();
const client = useSanctumClient();


const handleReset = async () =>{
    await client(`${config.public.baseUrl}/api/password/reset`, {
        method: 'POST',
        body:JSON.stringify(formData.value)
    })  

    router.push('/login')

}

</script>

<style scoped>

</style>