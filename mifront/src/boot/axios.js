import { boot } from 'quasar/wrappers'
import axios from 'axios'
import {useGlobalStore} from 'stores/global'
// Be careful when using SSR for cross-request state pollution
// due to creating a Singleton instance here;
// If any client changes this (global) instance, it might be a
// good idea to move this instance creation inside of the
// "export default () => {}" function below (which runs individually
// for each client)
const api = axios.create({ baseURL: process.env.API })

export default boot(({ app }) => {
  // for use inside Vue files (Options API) through this.$axios and this.$api

  app.config.globalProperties.$axios = axios
  // ^ ^ ^ this will allow you to use this.$axios (for Vue Options API form)
  //       so you won't necessarily have to import axios in each vue file

  app.config.globalProperties.$api = api

  const token = localStorage.getItem('tokenmi')
  if (token) {
    app.config.globalProperties.$api.defaults.headers.common['Authorization'] = 'Bearer '+token
    app.config.globalProperties.$api.post('me').then(res=>{
      useGlobalStore().user=res.data.user
      useGlobalStore().negocio=res.data.negocio
      useGlobalStore().perfil=res.data.perfil
      useGlobalStore().isLoggedIn=true
    }).catch(err=>{
      app.config.globalProperties.$api.defaults.headers.common['Authorization']=''
      useGlobalStore().user={}
      useGlobalStore().negocio={}
      useGlobalStore().perfil=[]
      localStorage.removeItem('tokenmi')
      useGlobalStore().isLoggedIn=false
      router.push('/login')
    })
  }
  // ^ ^ ^ this will allow you to use this.$api (for Vue Options API form)
  //       so you can easily perform requests against your app's API
})

export { api }
