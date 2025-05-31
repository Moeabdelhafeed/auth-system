<template>
    <div>

        this is the home page 
        
    </div>
</template>

<script setup>
definePageMeta({
    middleware: ['sanctum:auth', 'verified']
})






</script>

<style  scoped>

</style>