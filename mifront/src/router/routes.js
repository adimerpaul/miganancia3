import MainLayout from "layouts/MainLayout";
import IndexPage from "pages/IndexPage";
import Login from "pages/Login";
import Register from "pages/Register";

const routes = [
  {
    path: '/',
    component: MainLayout,
    children: [
      { path: '', component: IndexPage }
    ],
  },
  {path: '/login', component: Login,},
  {path: '/register', component: Register,},

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/ErrorNotFound.vue')
  }
]

export default routes
