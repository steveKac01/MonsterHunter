import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeView from '../views/HomeView.vue'

Vue.use(VueRouter)

const routes = [{
        path: '/',
        name: 'home',
        component: HomeView
    },
    {
        path: '/list',
        name: 'list',
        component: () =>
            import ('../views/ListView.vue')
    },
    {
        path: '/detail/:monsterId',
        name: 'detail',
        component: () =>
            import ('../views/DetailView.vue')
    },
    {
        path: '/admin',
        name: 'admin',
        component: () =>
            import ('../views/AdminView.vue')
    },
    {
        path: '/login',
        name: 'login',
        component: () =>
            import ('../views/loginView.vue')
    },
    {
        path: '/register',
        name: 'register',
        component: () =>
            import ('../views/registerView.vue')
    },
    {
        path: '/form',
        name: 'form',
        component: () =>
            import ('../views/MonsterFormView.vue')
    }, {
        path: '/form:monsterId',
        name: 'formEdit',
        component: () =>
            import ('../views/MonsterFormView.vue')
    }
]

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
})

export default router