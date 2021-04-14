//pages routes
import User from './components/admin/user';
import DailyNews from './components/admin/dailynews';
import Result from './components/admin/result';
import ContactUs from './components/admin/contact';  
import Dashboard from './components/admin/dashboard';  

// extension Routes 
import VueRouter from "vue-router";
import Axios from 'axios'
import Vue from 'vue' 

// used extention
Vue.use(Axios)
Vue.use(VueRouter); 


const routes = [
    {
        path: '/dashboard',
        component: Dashboard, 
    }, 
    {
        path: '/user',
        component: User, 
    },
    {
        path: '/news',
        component: DailyNews, 
    },
    {
        path: '/result',
        component: Result, 
    },
    {
        path: '/contact',
        component: ContactUs, 
    }, 
]


const router = new VueRouter({
    routes: routes,
    linkActiveClass: 'active',
    mode: 'hash',
    hashbang: true,
    history: false,
})

export default router
