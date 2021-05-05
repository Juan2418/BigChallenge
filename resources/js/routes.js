import VueRouter from "vue-router";
import categories from './views/categories.vue';
import ProductCostumization from "./views/ProductCostumization";

let routes = [
    {
        path: '/',
        component: categories,
    },
    {
        path: '/add-product',
        component: ProductCostumization,
    },
];

export default new VueRouter({
    routes
});
