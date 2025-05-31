// middleware/verify-result.ts
export default defineNuxtRouteMiddleware((to) => {
  const allowedStatuses = ['success', 'expired', 'verified'];
  const status = to.query.status;

  if (!status || !allowedStatuses.includes(status)) {
    return navigateTo('/');
  }
});
