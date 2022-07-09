<template>
  <q-layout view="lHh Lpr lFf">
    <q-page class="q-px-lg">
      <div class="row">
        <div class="col-12 col-sm-6 q-pa-lg">
          <div class="text-bold text-h5 text-center">Crear un nuevo negocio!</div>
          <div class="text-caption text-grey">Los campos marcados con asterisco (<span class="text-red">*</span>) son obligatorios</div>
          <q-form @submit.prevent="register">
            <div class="row">
              <div class="col-12">
                <div class="text-bold">Tipo de negocio <span class="text-red">*</span></div>
                <q-select
                  dense
                  outlined
                  hint="Seleccionar una categoria"
                  v-model="user.tipos"
                  :options="optionsTipo"
                  placeholder="Tipo de negocio *"
                >
                  <template v-slot:option="scope">
                    <q-item v-bind="scope.itemProps">
                      <q-item-section avatar>
                        <q-icon :name="scope.opt.icon" />
                      </q-item-section>
                      <q-item-section>
                        <q-item-label>{{ scope.opt.label }}</q-item-label>
                        <q-item-label caption>{{ scope.opt.description }}</q-item-label>
                      </q-item-section>
                    </q-item>
                  </template>
<!--                  <template v-slot:prepend>-->
<!--                    <q-icon name="precision_manufacturing"/>-->
<!--                  </template>-->
                  <template v-slot:selected>
                    <q-chip
                      v-if="user.tipos"
                      dense
                      square
                      color="white"
                      text-color="primary"
                      class="q-my-none q-ml-xs q-mr-none"
                    >
                      <q-avatar color="primary" text-color="white" :icon="user.tipos.icon" />
                      {{ user.tipos.label }}
                    </q-chip>
                    <q-badge v-else>*none*</q-badge>
                  </template>
                </q-select>
              </div>
              <div class="col-12">
                <div class="text-bold">Direccion </div>
                <q-input dense outlined v-model="user.direccion" placeholder="Dirección del negocio" hint="Porfavor ingresar direccion" >
                  <template v-slot:prepend>
                    <q-icon name="share_location" />
                  </template>
                </q-input>
              </div>
              <div class="col-12">
                <div class="text-bold">Ciudad </div>
                <q-input dense outlined v-model="user.ciudad" placeholder="Ciudad donde se ubica el negocio" hint="Porfavor ingresar ciudad" >
                  <template v-slot:prepend>
                    <q-icon name="location_city" />
                  </template>
                </q-input>
              </div>
              <div class="col-12">
                <div class="text-bold">Email <span class="text-red">*</span></div>
                <q-input dense outlined type="email" v-model="user.email" placeholder="Email*" hint="Porfavor ingresar email" :rules="rule" required>
                  <template v-slot:prepend>
                    <q-icon name="o_email" />
                  </template>
                </q-input>
              </div>
              <div class="col-12">
                <div class="text-bold">Nombre Completo <span class="text-red">*</span></div>
                <q-input dense outlined v-model="user.name" placeholder="Nombre completo*" hint="Porfavor ingresar nombre completo" :rules="rule">
                  <template v-slot:prepend>
                    <q-icon name="people" />
                  </template>
                </q-input>
              </div>
              <div class="col-12">
                <div class="text-bold">Contraseña <span class="text-red">*</span></div>
                <q-input ref="fldPasswordChange" dense outlined v-model="user.password" placeholder="password*" :type="isPwd ? 'password' : 'text'" hint="Porfavor ingresar contraseña" :rules="ruleNumber">
                  <template v-slot:prepend>
                    <q-icon name="o_lock" />
                  </template>
                  <template v-slot:append>
                    <q-icon
                      :name="isPwd ? 'visibility_off' : 'visibility'"
                      class="cursor-pointer"
                      @click="isPwd = !isPwd"
                    />
                  </template>
                </q-input>
              </div>
              <div class="col-12">
                <div class="text-bold">Repetir contraseña <span class="text-red">*</span></div>
                <q-input dense outlined v-model="user.password_confirmation" placeholder="Repetir contraseña*" :type="isPwd ? 'password' : 'text'" hint="Porfavor vuelva a escribir su contraseña" :rules="ruleNumber">
                  <template v-slot:prepend>
                    <q-icon name="o_lock" />
                  </template>
                  <template v-slot:append>
                    <q-icon
                      :name="isPwd ? 'visibility_off' : 'visibility'"
                      class="cursor-pointer"
                      @click="isPwd = !isPwd"
                    />
                  </template>
                </q-input>
              </div>
              <div class="col-12">
                <div class="text-bold">Logo de empresa</div>
                <div class="text-center flex flex-center" >
                  <q-uploader
                    accept=".jpg, .png"
                    @added="uploadFile"
                    auto-upload
                    max-files="1"
                    label="Ingresar el logo de su empresa"
                    flat
                    bordered
                  />
                </div>
              </div>
              <div class="col-12 q-pa-xs">
                <q-btn type="submit" color="yellow" class="full-width text-black" label="Registrate" no-caps />
              </div>
              <div class="col-12 q-pa-xs">
                <q-btn outline class="full-width text-black" label="Atras" no-caps to="login" />
              </div>
            </div>
          </q-form>
        </div>
        <div class="col-12 col-sm-6">
          <div class="row">
            <div class="col-12 text-center">
              <div class="text-h6 text-grey">
                <q-icon name="o_shopping_bag" /> Mi ganancia
              </div>
            </div>
            <div class="col-12 flex flex-center q-px-lg">
              <q-img src="logo.png"/>
            </div>
          </div>
        </div>

      </div>

    </q-page>
  </q-layout>
</template>
<script>
import {useGlobalStore} from "stores/global";
export default {
  name: `register`,
  data(){
    return {
      global:useGlobalStore(),
      user: {
        tipos:{
          label: 'Supermercado o tienda de conveniencia',
          value: 'Supermercado o tienda de conveniencia',
          description: 'Establecimiento comercial que venden una variedad de artículos cotidianos',
          icon: 'shopping_cart'
        },
      },
      rule:[val => (val && val.length > 0) || 'Por favor escriba algo'],
      ruleNumber:[
        val => (val && val.length > 0) || 'Por favor escriba algo',
        val => val.length >= 6 || 'Utilice un minimo 6 caracteres',
        (val) => val == this.user.password|| "Contraseñas diferentes",
      ],
      optionsTipo: [
        {
          label: 'Supermercado o tienda de conveniencia',
          value: 'Supermercado o tienda de conveniencia',
          description: 'Establecimiento comercial que venden una variedad de artículos cotidianos',
          icon: 'shopping_cart'
        },
        {
          label: 'Industria o manufactura',
          value: 'Industria o manufactura',
          description: 'Tiendas de conveniencia a los establecimientos comerciales que venden una variedad de artículos',
          icon: 'factory'
        },
        {
          label: 'Servicios de transporte y logística',
          value: 'Servicios de transporte y logística',
          description: 'Movilizar la mercancía a lo largo de la cadena de suministro',
          icon: 'polymer'
        },
      ],
      isPwd:true,
    }
  },
  created() {
    if (this.global.isLoggedIn){
      this.$router.push('/')
    }
  },
  methods:{
    register(){
      if (this.user.tipos=='' || this.user.tipos==undefined){
        this.$q.notify({
          message:'Debes seleccionar tipo de negocio',
          color:'red',
          icon:'error'
        })
        return false
      }
      this.$q.loading.show()
      this.user.foto=this.foto
      this.user.tipo=this.user.tipos.label
      this.$api.post('/register',this.user).then(res=>{
        this.$q.loading.hide()
        this.global.user=res.data.user
        this.global.negocio=res.data.negocio
        localStorage.setItem('tokenmi', res.data.token)
        this.global.isLoggedIn=true
        this.$api.defaults.headers.common['Authorization'] = 'Bearer '+res.data.token
        this.$router.push('/')
      })
      //   .catch(err => {
      //   this.$q.loading.hide()
      //   this.$q.notify({
      //     message: err.response.data.message,
      //     color: 'red',
      //     icon: 'error'
      //   })
      // })
    },
    uploadFile (file) {
      let dialog = this.$q.dialog({
        message: 'Subiendo... 0%',
      })
      let percentage = 0
      const fd = new FormData()
      fd.append('file', file[0])
      return new Promise((resolve, reject) => {
        this.$api.post('upload',
          fd,
          {
            headers: { 'Content-Type': 'multipart/form-data' },
            onUploadProgress: (progressEvent) => {
              percentage = Math.round((progressEvent.loaded / progressEvent.total) * 100)
              dialog.update({
                message: `Subiendo... ${percentage}%`
              })
              if (percentage>=100){
                dialog.hide()
              }
            }
          })
          .then(res => {
            this.foto=res.data
            resolve(file)
          })
          .catch(err => reject(err))
      })
    },
  }
}
</script>

<style scoped>

</style>
