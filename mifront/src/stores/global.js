import { defineStore } from 'pinia';

export const useGlobalStore = defineStore('global', {
  state: () => ({
    user:{},
    leftDrawerOpen:false,
    permisos:[],
    negocio:{},
    perfil:[],
    isLoggedIn:!!localStorage.getItem('tokenmi'),
  }),
  getters: {
    doubleCount: (state) => state.counter * 2,
  },
  actions: {
    increment() {
      this.counter++;
    },
  },
});
