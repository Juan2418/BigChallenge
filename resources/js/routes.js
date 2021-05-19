import VueRouter from "vue-router";
import Home from './views/Home.vue';
import ProductCostumization from "./views/ProductCostumization";
import ModifyProduct from "./views/ModifyProduct";
import Cart from "./views/Cart";
import CreditCardPayment from "./views/CreditCardPayment";
import PopularProducts from "./views/PopularProducts";

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
    {
        path: '/pay/creditcard',
        component: CreditCardPayment,
    },
    {
        path: '/popular-products',
        component: PopularProducts,
    },
];

export default new VueRouter({
    routes
});
