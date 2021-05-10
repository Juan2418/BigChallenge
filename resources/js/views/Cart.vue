<template>
    <Main class="grid grid-cols-2 grid-cols-main bg-gray-200">
        <nav-bar></nav-bar>
        <section class="container h-screen overflow-y-scroll">
            <p class="font-bold text-2xl my-4">Your products</p>
            <product-list-horizontal :products="products"/>
        </section>
    </Main>
</template>

<script>
import NavBar from "../components/NavBar";
import ProductListHorizontal from "../components/ProductListHorizontal";

export default {
    name: "cart",
    components: {ProductListHorizontal, NavBar},

    data() {
        return {
            products: Store.productsToOrder
        }
    }
}
</script>

