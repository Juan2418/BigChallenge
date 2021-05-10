import VueRouter from "vue-router";
import Home from './views/Home.vue';
import ProductCostumization from "./views/ProductCostumization";

let routes = [
    {
        path: '/',
        component: Home,
    },
    {
        path: '/add-product',
        component: ProductCostumization,
    },
];

export default new VueRouter({
    routes
});
