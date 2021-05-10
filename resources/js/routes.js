import VueRouter from "vue-router";
import Home from './views/Home.vue';
import ProductCostumization from "./views/ProductCostumization";
import ModifyProduct from "./views/ModifyProduct";
import Cart from "./views/Cart";

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
    {
        path: '/cart',
        component: Cart,
    },
];

export default new VueRouter({
    routes
});
