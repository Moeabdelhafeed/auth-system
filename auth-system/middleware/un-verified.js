export default defineNuxtRouteMiddleware((to, from) => {

    const {user} = useSanctumAuth();

  if (user.value.email_verified_at) {
    return navigateTo('/')
  }
})
