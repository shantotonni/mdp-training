import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from '../views/auth/Login.vue'
import Main from '../components/layouts/Main'
import Dashboard from '../views/dashboard/Index.vue'
import MDPList from '../views/mdp/MDPList'
import MDPCreate from '../views/mdp/Create'
import MDPEdit from '../views/mdp/Edit'
import MDPPrint from '../views/mdp/Print'

import NotFound from '../views/404/Index';
import {baseurl} from '../base_url'

Vue.use(VueRouter);

const config = () => {
    let token = localStorage.getItem('token');
    return {
        headers: {Authorization: `Bearer ${token}`}
    };
}
const checkToken = (to, from, next) => {
    let token = localStorage.getItem('token');
    if (token === 'undefined' || token === null || token === '') {
        next(baseurl + 'login');
    } else {
        next();
    }
};

const activeToken = (to, from, next) => {
    let token = localStorage.getItem('token');
    if (token === 'undefined' || token === null || token === '') {
        next();
    } else {
        next(baseurl);
    }
};

const routes = [
    {
        path: baseurl,
        component: Main,
        redirect: {name: 'Dashboard'},
        children: [
            //DASHBAORD
            {
                path: baseurl + 'dashboard',
                name: 'Dashboard',
                component: Dashboard
            },
            //mdp list
            {
                path: baseurl + 'mdp-list', name: 'MDPList', component: MDPList
            },
            {
                path: baseurl + 'mdp-create', name: 'MDPCreate', component: MDPCreate
            },
            {
                path: baseurl + 'mdp-edit/:ID', name: 'MDPEdit', component: MDPEdit
            },
            {
                path: baseurl + 'mdp-print/:ID', name: 'MDPPrint', component: MDPPrint
            },
        ],
        beforeEnter(to, from, next) {
            checkToken(to, from, next);
        }
    },
    {
        path: baseurl + 'login',
        name: 'Login',
        component: Login,
        beforeEnter(to, from, next) {
            activeToken(to, from, next);
        }
    },
    {
        path: baseurl + '*',
        name: 'NotFound',
        component: NotFound,
    },
]

const router = new VueRouter({
    mode: 'history',
    base: process.env.baseurl,
    routes
});

router.afterEach(() => {
    $('#preloader').hide();
});

export default router
