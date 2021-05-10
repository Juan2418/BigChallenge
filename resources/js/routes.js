import VueRouter from "vue-router";
import Home from './views/Home.vue';
import ProductCostumization from "./views/ProductCostumization";
import ModifyProduct from "./views/ModifyProduct";

let routes = [
    {
        path: '/',
        component: Home,
    },
    {
        path: '/add-product',
        component: ProductCostumization,
    },
    {
        path: '/modify',
        component: ModifyProduct,
    },
];

export default new VueRouter({
    routes
});
