import { createRouter, createWebHistory } from 'vue-router'
import Dashboard from '@/views/Dashboard'

const routes = [

  {
    path: '/',
    name: 'Dashboard',
    component: Dashboard,
    children: [
      {
        path: 'home',
        component: () => import(/* webpackChunkName: "Overview" */ '../views/Home.vue')
      },
      {
        path: 'admin',
        component: () => import(/* webpackChunkName: "Overview" */ '../views/Admin.vue')
      },
      {
        path: 'tasks',
        component: () => import(/* webpackChunkName: "Messages" */ '../views/Tasks.vue')
      },
      {
        path: 'vehicles',
        component: () => import(/* webpackChunkName: "Profile" */ '../views/Vehicles.vue')
      },
      {
        path: 'drivers',
        component: () => import(/* webpackChunkName: "Settings" */ '../views/Drivers.vue')
      }

    ]
  },
 
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
