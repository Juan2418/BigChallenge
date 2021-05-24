<template>
    <nav class="h-screen flex flex-col items-center text-white bg-primary border-r-2 py-3">
        <router-link to="/">
            <a class="w-full">
                <img :src="'icons/home_white.svg'" alt="Home"
                     class="w-12 md:w-16
                            scale-on-hover">
            </a>
        </router-link>
        <router-link to="/popular-products">
            <a>
                <img :src="'icons/star_white.svg'" alt="Popular products"
                     class="w-12 md:w-16 my-4
                            scale-on-hover "
                >
            </a>
        </router-link>
        <router-link to="/cart">
            <a>
                <img :src="'icons/shopping_cart_white.svg'" alt="Shopping cart"
                     class="w-12 md:w-16 my-4
                            scale-on-hover "
                >
            </a>
        </router-link>

        <img v-for="(product, index) in productsToOrder" :src="product.image" :alt="product.name"
             class="rounded-full md:p-2
                    w-2/3 md:w-1/4
                    my-2
                    h-16
                    md:border-4
                    scale-on-hover
                    animate__animated animate__slideInDown"
             @click="modifyProduct(product, index)"
        >
    </nav>
</template>
<script>
import {modifyProduct} from "../utilities";

export default {
    name: 'nav-bar',
    data() {
        return {
            productsToOrder: Store.productsToOrder
        }
    },
    methods: {
        modifyProduct
    },
}
</script>

<style>

</style>
