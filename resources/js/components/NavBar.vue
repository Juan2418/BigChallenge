<template>
    <nav class="h-screen flex flex-col items-center text-white bg-primary border-r-2 py-3">
        <router-link to="/"><a><img :src="'icons/home_white.svg'" alt="Home" width="100px"></a>
        </router-link>
        <img v-for="product in productsToOrder" :src="product.image" :alt="product.name"
             class="rounded-circle"
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
    }
}
</script>
