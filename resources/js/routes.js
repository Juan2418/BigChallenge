import VueRouter from "vue-router";
import categories from './views/categories.vue';

let routes = [
    {
        path: '/',
        component: categories,
    }
];

export default new VueRouter({
    routes
});
