<template>
    <div class="grid grid-cols-2 grid-cols-main bg-gray-200">
        <nav-bar/>
        <main v-if="loaded"
              class="flex flex-wrap px-1 justify-center
                    overflow-y-scroll w-full h-screen"
        >
            <ProductList
                v-for="(product, i) in products"
                :key="i"
                v-bind:product="product"
            ></ProductList>
        </main>
    </div>
</template>

<script>
import NavBar from "../components/NavBar";
import ProductList from "../components/ProductList";

export default {
    name: "PopularProducts",
    components: {NavBar, ProductList},
    data() {
        return {
            products: [],
            loaded: false
        }
    },
    mounted() {
        axios.get('api/product-popularity')
                .then(({data}) => {
                    this.products = data;
                    this.loaded = true;
                });
    }
}
</script>

<style scoped>

</style>
