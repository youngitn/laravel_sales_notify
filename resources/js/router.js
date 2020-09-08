
import Vue from 'vue';
import VueRouter from 'vue-router';

import Indexx from './components/indexx';
import NotFound from './components/notFound.vue';
import Create from './components/Create.vue';
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/indexx',
            name: 'indexx',
            component: Indexx
        },
        ,
        {
            path: '/create',
            component: Create
        }, {
            path: '/:id',
            //用require需要加.default
            component: require('./components/Show').default
        },
        {
            path: '/:id/edit',
            component: require('./components/Edit').default
        },
        {
            path: '/*',
            name: '404',
            component: NotFound
        }
    ]
});

export default router;
