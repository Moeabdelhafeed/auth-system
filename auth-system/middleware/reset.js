export default defineNuxtRouteMiddleware(async (to, from) => {

const token = to.query.token
const email = to.query.email

const config = useRuntimeConfig()

    const {data, error} = await useFetch(`${config.public.baseUrl}/api/password/validate`, {
        method: 'post',
        body:{
            email: email,
            token: token
        }
    })

    if (error.value){
        return navigateTo('/login')
    }

})
