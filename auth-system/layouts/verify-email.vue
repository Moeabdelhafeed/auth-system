<template>
     <div class="navbar bg-base-100 shadow-sm">
  <div class="flex-1">
    <a class="btn btn-ghost text-xl">auth system</a>
  </div>
  <div class="flex-none">
    <ul class="menu menu-horizontal px-1">
      <li @click="handleLogout"> <a > logout </a></li>
    </ul>
  </div>
</div>
    <div class="container mx-auto p-4">
        <slot />
    </div>
</template>

<script setup>
const  {logout} = useSanctumAuth()
const handleLogout = async () => {
    await logout()
}

</script>

<style scoped>

</style>