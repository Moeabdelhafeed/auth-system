<template>
  <div class="flex flex-col items-center justify-center mt-20">
    <h1 v-if="status === 'success'" class="text-3xl text-center">
      Your email was successfully verified!
    </h1>

    <h1 v-else-if="status === 'expired'" class="text-3xl text-center ">
      Verification link has expired.
    </h1>

    <h1 v-else-if="status === 'verified'" class="text-3xl text-center ">
      Your email is already verified.
    </h1>

    <NuxtLink class="btn btn-primary mt-5" to="/">Go to Home</NuxtLink>
  </div>
</template>

<script setup>
const route = useRoute();
const status = route.query.status;

definePageMeta({
  layout: 'verify-email',
  middleware: 'verify-result',
});

useHead({
  title: status === 'success' ? 'Email Verified' 
        : status === 'expired' ? 'Link Expired' 
        : 'Already Verified'
});

</script>
