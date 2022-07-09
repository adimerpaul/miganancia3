<template>
  <q-layout view="lHh Lpr lFf">
    <q-page class="q-px-lg">
      <div class="row">
        <div class="col-12 col-sm-6 q-pa-lg">
          <div class="text-bold text-h2 text-center">Bienvenido!</div>
          <div class="text-bold text-center">Iniciar sesión con tu cuenta</div>
          <q-form>
            <div class="row">
              <div class="col-12">
                <div class="text-bold">Email <span class="text-red">*</span></div>
                <q-input v-model="user.email"  placeholder="Email" type="email" hint="">
                  <template v-slot:prepend>
                    <q-icon name="o_email" />
                  </template>
                </q-input>
              </div>
              <div class="col-12">
                <div class="text-bold">Contraseña <span class="text-red">*</span></div>
                <q-input :type="isPwd ? 'password' : 'text'" v-model="user.password"  placeholder="Contraseña" hint="">
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
              <div class="col-12 q-pa-xs">
                <q-btn color="yellow" class="full-width text-black" label="Ingresar" no-caps />
              </div>
              <div class="col-12 q-pa-xs">
                <q-btn outline to="register" class="full-width text-black" label="Registrate" no-caps />
              </div>
              <div class="col-12">
                <div class="text-caption q-py-xs">
                  <a target="_blank" href="https://api.whatsapp.com/send?phone=59169603027&text=olvide mi contraseña">Olvidate tu contraseña?</a>
                </div>
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
export default {
  name: `Login`,
  data(){
    return {
      user: {},
      isPwd:true,
    }
  },
}
</script>

<style scoped>

</style>
