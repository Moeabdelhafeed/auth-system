<template>
    <div>
        this is the home page 
        {{ data }}

    </div>
</template>

<script setup>
definePageMeta({
    middleware: 'sanctum:auth'
})


const {isAuthenticated} = useSanctumAuth();

const config = useRuntimeConfig()
const client = useSanctumClient()

const data =  await client(`${config.public.baseUrl}/api/message`, {
        method: 'POST'
    })



</script>

<style  scoped>

</style>