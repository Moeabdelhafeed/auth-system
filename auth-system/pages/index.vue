<template>
    <div>
        this is the home page 
        
    </div>
</template>

<script setup>
definePageMeta({
    middleware: ['sanctum:auth', 'verified']
})


const {isAuthenticated, user} = useSanctumAuth();

const config = useRuntimeConfig()
const client = useSanctumClient()




</script>

<style  scoped>

</style>