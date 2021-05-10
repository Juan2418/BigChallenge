<template>
    <nav class="h-screen flex flex-col items-center text-white bg-primary border-r-2 py-3">
        <router-link to="/"><a class="w-full"><img :src="'icons/home_white.svg'" alt="Home" class="w-12 md:w-16"></a>
        </router-link>
        <img :src="'icons/shopping_cart_white.svg'" alt="Shopping cart" class="w-12 md:w-16 my-4">
        <img v-for="product in productsToOrder" :src="product.image" :alt="product.name"
             class="rounded-full md:p-2 w-2/3 md:w-1/4 md:border-4"
             @click="modifyProduct(product)"
        >
    </nav>
</template>
<script>
export default {
    name: 'nav-bar',
    data() {
        return {
            productsToOrder: Store.productsToOrder
        }
    },
    methods: {
        modifyProduct(product) {
            Store.productToModify = product;
            SPA.$router.push('/modify');
        }
    },
}
</script>
