import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import CompteView from '../views/CompteView.vue'
import CollecteIdView from '../views/CollecteIdView.vue'
import PointcollecteView from '../views/PointCollecteView.vue'
import EntrepriseView from '../views/EntrepriseView.vue'
import PassageView from '../views/PassageView.vue'
import AttestationView from '../views/AttestationView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    },
    {
      path: '/compte',
      name: 'compte',
      component: CompteView
    },
    {
      path: '/collecteId',
      name: 'collecteId',
      component: CollecteIdView
    },
    {
      path: '/pointcollecte',
      name: 'pointcollecte',
      component: PointcollecteView
    },
    {
      path: '/entreprise',
      name: 'entreprise',
      component: EntrepriseView
    },
    {
      path: '/passage',
      name: 'passage',
      component: PassageView
    },
    {
      path: '/attestation',
      name: 'attestation',
      component: AttestationView
    },
  ]
})

export default router
