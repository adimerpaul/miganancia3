<template>
  <q-layout view="lHh Lpr lFf">
    <q-drawer v-model="global.leftDrawerOpen" show-if-above bordered>
      <q-list>
        <q-item>
          <q-img src="/logo.jpg" spinner-color="white" style="height: 28px; max-width: 30px" />
          <q-item-section class="text-center text-bold">Mi Ganancia</q-item-section>
        </q-item>
            <div v-if="global.isLoggedIn" class="q-px-lg"> <b>Bienvenido: </b> {{global.user.name}}</div>
        <q-item>
          <q-item-section>
            <q-card class="q-pa-none bg-grey-3" v-if="global.isLoggedIn">
              <q-card-section horizontal>
                <q-card-section class="q-pa-none q-ma-none flex flex-center">
                  <a :href="url+'../imagenes/'+global.negocio.foto" target="_blank">
                    <q-img v-if="global.negocio!={}&&global.negocio.foto!=undefined" :src="url+'../imagenes/'+global.negocio.foto" class="q-ma-xs" style="border:0px solid black;height: 50px;width: 50px;border-radius: 25px"/>
                  </a>
                </q-card-section>
                <q-card-section class="q-pa-none q-ma-none flex flex-center">
                  <q-card-section class="q-pa-none q-ma-none" horizontal>
                    <q-card-section class="q-pa-none q-ma-none">
                      <q-item-label>{{global.negocio.nombre}}</q-item-label>
                      <q-item-label caption>{{global.negocio.tipo}}</q-item-label>
                    </q-card-section>
                    <q-card-section @click="clickCambioEmpresa" class="q-pa-none q-ma-none flex flex-center">
                      <q-icon name="o_arrow_drop_down_circle" size="30px" />
                    </q-card-section>
                  </q-card-section>
                </q-card-section>
              </q-card-section>
              <q-separator/>
              <q-card-section class="q-pa-xs">
                <div class="flex flex-center" @click="clickUpdateNegocio"> <q-icon name="edit" class="q-pr-xs" /> <div class="text-bold"> Editar negocio</div></div>
                <div class="flex flex-center" @click="clickCreateNegocio"> <q-icon name="add_circle" class="q-pr-xs" />  <div class="text-bold"> Agregar otro negocio</div></div>
              </q-card-section>
            </q-card>
          </q-item-section>
        </q-item>
        <q-item active-class="active" style="font-weight: bold" exact to="/" clickable v-if="global.isLoggedIn">
          <q-item-section avatar>
            <q-icon name="balance" />
          </q-item-section>
          <q-item-section>
            <q-item-label>Balance</q-item-label>
          </q-item-section>
        </q-item>
        <q-item active-class="active" style="font-weight: bold" exact to="inventario" clickable v-if="global.isLoggedIn">
          <q-item-section avatar>
            <q-icon name="o_inventory" />
          </q-item-section>
          <q-item-section>
            <q-item-label>Inventario</q-item-label>
          </q-item-section>
        </q-item>
<!--        <q-item active-class="active" style="font-weight: bold" exact to="usuarios" clickable v-if="global.isLoggedIn">-->
<!--          <q-item-section avatar>-->
<!--            <q-icon name="o_people" />-->
<!--          </q-item-section>-->
<!--          <q-item-section>-->
<!--            <q-item-label>Personal</q-item-label>-->
<!--          </q-item-section>-->
<!--        </q-item>-->
<!--        <q-item active-class="active" @click="clickDialogCLientes" style="font-weight: bold" exact clickable v-if="global.isLoggedIn">-->
<!--          <q-item-section avatar>-->
<!--            <q-icon name="o_store" />-->
<!--          </q-item-section>-->
<!--          <q-item-section>-->
<!--            <q-item-label>Clientes</q-item-label>-->
<!--          </q-item-section>-->
<!--        </q-item>-->
<!--        <q-item active-class="active" style="font-weight: bold" exact clickable v-if="global.isLoggedIn">-->
<!--          <q-item-section avatar>-->
<!--            <q-icon name="emoji_transportation" />-->
<!--          </q-item-section>-->
<!--          <q-item-section>-->
<!--            <q-item-label>Proveedores</q-item-label>-->
<!--          </q-item-section>-->
<!--        </q-item>-->
        <q-expansion-item
          active-class="active"
          expand-separator
          icon="o_manage_accounts"
          label="Modulo clientes proveedor"
          class="text-bold"
        >
<!--          <q-card>-->
<!--            <q-card-section>-->
        <q-item class="q-pl-lg" active-class="active" style="font-weight: bold" exact to="usuarios" clickable v-if="global.isLoggedIn">
          <q-item-section avatar>
            <q-icon name="o_people" />
          </q-item-section>
          <q-item-section>
            <q-item-label>Personal</q-item-label>
          </q-item-section>
        </q-item>
        <q-item class="q-pl-lg" active-class="active" @click="clickDialogCLientes" style="font-weight: bold" exact clickable v-if="global.isLoggedIn">
          <q-item-section avatar>
            <q-icon name="o_store" />
          </q-item-section>
          <q-item-section>
            <q-item-label>Clientes</q-item-label>
          </q-item-section>
        </q-item>
        <q-item class="q-pl-lg" active-class="active" style="font-weight: bold" exact clickable v-if="global.isLoggedIn">
          <q-item-section avatar>
            <q-icon name="emoji_transportation" />
          </q-item-section>
          <q-item-section>
            <q-item-label>Proveedores</q-item-label>
          </q-item-section>
        </q-item>
<!--            </q-card-section>-->
<!--          </q-card>-->
        </q-expansion-item>
        <q-expansion-item
          active-class="active"
          expand-separator
          icon="o_airport_shuttle"
          label="Modulo pedidos"
          class="text-bold"
        >
        <q-item class="q-pl-lg" clickable to="/realizarpedido" exact active-class="active">
          <q-item-section avatar>
            <q-icon name="travel_explore" />
          </q-item-section>
          <q-item-section>
            <q-item-label>Realizar Pedido</q-item-label>
          </q-item-section>
        </q-item>
        <q-item class="q-pl-lg" clickable to="/pedidosrealizados" exact>
          <q-item-section avatar>
            <q-icon name="history_edu" />
          </q-item-section>
          <q-item-section>
            <q-item-label>Pedidos realizados</q-item-label>
          </q-item-section>
        </q-item>
        </q-expansion-item>
        <div style="position: absolute;bottom: 0px" class="full-width">
          <q-list  >
            <q-item class="full-width text-grey" clickable v-if="global.isLoggedIn">
              <q-item-section avatar>
                <q-icon name="help_outline" />
              </q-item-section>
              <q-item-section>
                <q-item-label>¿Necesitas contactar a soporte? ¡Hazlo aquí!</q-item-label>
              </q-item-section>
            </q-item>
            <q-item class="full-width text-grey" clickable v-if="global.isLoggedIn">
              <q-item-section avatar>
                <q-icon name="subject" />
              </q-item-section>
              <q-item-section>
                <q-item-label>Términos y condiciones y Política de privacidad</q-item-label>
              </q-item-section>
            </q-item>
            <q-item class="full-width text-red" clickable @click="logout" v-if="global.isLoggedIn">
              <q-item-section avatar>
                <q-icon name="logout" />
              </q-item-section>
              <q-item-section>
                <q-item-label>Cerrar sesión</q-item-label>
              </q-item-section>
            </q-item>
          </q-list>
        </div>
      </q-list>

    </q-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
import {useGlobalStore} from "stores/global";

export default {
  data(){
    return{
      url:process.env.API,
      global:useGlobalStore(),
    }
  },
  methods:{
    clickCambioEmpresa(){
      this.$q.loading.show()
      this.$api.get('negocio/'+this.global.user.id).then(res=>{
        this.negocios=res.data
        this.dialogcambioempresa=true
        this.$q.loading.hide()
      })
    },
    clickUpdateNegocio(){
      console.log('a');
    },
    clickDialogCLientes(){
      // this.$q.loading.show()
      // this.misclientes()
    },
    logout(){
      this.$q.dialog({
        message:'¿Quieres cerrar sesión?',
        title:"Salir",
        ok:{
          push:true
        },
        cancel:{
          push:true,
          color:'negative'
        }
      }).onOk(()=>{
        this.$q.loading.show()
        this.$api.post('logout').then(res=>{
          this.$api.defaults.headers.common['Authorization']=''
          this.global.user={}
          this.global.negocio={}
          localStorage.removeItem('tokenmi')
          this.global.isLoggedIn=false
          this.$router.push('/login')
          this.$q.loading.hide()
        })
      })
    }
  }
}
</script>
<style scoped>
.active{
  background: rgb(255,238,179);
  font-weight: bold;
  color: #2d3748;
  border-left: 5px solid #FECB18;
}
</style>
