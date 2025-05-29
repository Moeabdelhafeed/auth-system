// https://nuxt.com/docs/api/configuration/nuxt-config
import tailwindcss from "@tailwindcss/vite";

export default defineNuxtConfig({
  compatibilityDate: '2025-05-15',
  devtools: { enabled: true },

  vite: {
    plugins: [tailwindcss()]
  },

  css: ['~/assets/css/main.css'],
  modules: ['nuxt-auth-sanctum'],
  sanctum:{
    baseUrl: 'http://localhost:8000', // your backend url
    endpoints:{
      login: '/api/login', // your login api route
      logout: '/api/logout' // your logout api route
    },
    redirect:{
      onLogin: '/',
      onLogout: '/login'
    }
  },
  runtimeConfig:{
    public:{
      baseUrl: 'http://localhost:8000' // your api url
    }
  }
})