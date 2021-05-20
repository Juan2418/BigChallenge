<template>
    <div class="grid grid-cols-2 grid-cols-main bg-gray-200">
        <nav-bar/>
        <main v-if="loaded"
              class="flex flex-wrap px-1 justify-center
                    overflow-y-scroll w-full h-screen"
        >
            <h1 class="text-2xl py-2 font-bold">Top products</h1>
            <section class="flex flex-wrap
                            px-1 py-2 w-full
                            justify-center
                            overflow-y-scroll">
                <ProductList
                    v-for="(product, i) in products"
                    :key="i"
                    v-bind:product="product"
                ></ProductList>
            </section>
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
