<template>
    <div class="flex flex-col items-center justify-center mt-20 ">
        <h1 class="text-3xl text-center">You must verify your email</h1>
        
        <a href="https://gmail.com/" class="btn btn-primary mt-5">Open Gmail</a>
        <p class="mt-5">didnt recive the email? <span @click="handleResend" class=" underline hover:text-blue-900 cursor-pointer">resend</span></p>
        <p v-if="success" class="mt-2 text-sm text-green-300">Your Verification Email is Sent</p>
    </div>
</template>

<script setup>

definePageMeta({
    layout: 'verify-email',
    middleware: ['sanctum:auth', 'un-verified']
})

const config = useRuntimeConfig();
const client = useSanctumClient();

useHead({
    title: 'verify email'
})

const success = ref(false)



const handleResend = async () =>{
    const data = await client(`${config.public.baseUrl}/api/email/resend`, {
        method: 'POST'
    })  

    success.value = true

    setTimeout(() => {
        success.value = false
    }, 4000)
}

</script>

<style scoped>

</style>