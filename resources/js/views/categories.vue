<template>
    <Main v-if="categoriesLoaded" class="grid grid-cols-category-product md:grid-cols-2 categories-grid">
        <section class="flex flex-col justify-content-center gap-4 absolute w-1/3 h-screen
                         overflow-y-scroll
                         snap snap-y snap-mandatory">
            <div v-for="(category, index) in categories"
                 :class="cardCarouselStyles() + selectBGColor(index)"
                 :key="index"
                 @click="selectCategory(category)">
                <img :src=getCategoryImage(category) alt="Category image" width="100px">
                <hr class="mt-3"/>
                {{ category.name }}
            </div>
        </section>
        <section class="flex flex-wrap px-1 justify-center product-list overflow-y-scroll w-full h-screen">
            <ProductList v-for="(product, i) in currentCategory.products" :key="i" v-bind:product="product"></ProductList>
        </section>
    </Main>
</template>

<script>
import ProductList from "../components/ProductList";

export default {
    components: {ProductList},
    data() {
        return {
            categories: [],
            currentCategory: null,
            categoriesLoaded: false
        }
    },

    mounted() {
        axios.get('/categories').then(({data}) => {
            this.categories = data;
            this.currentCategory = this.categories[0];
            this.categoriesLoaded = true;
        })
    },
    methods: {
        getCategoryImage(category) {
            return `${category.image}`;
        },

        cardCarouselStyles() {
            return `font-extrabold text-lg text-md-center
                 p-4 text-center grid grid-cols-1
                 snap-start w-full h-screen
                 justify-items-center `
        },

        selectBGColor(index) {
            return index % 2 == 0 ?
                `bg-primary text-secondary` :
                `bg-secondary text-primary`
        },

        selectCategory(category) {
            this.currentCategory = category;
        }
    }

}
</script>

<style>
    .categories-grid {
        grid-template-areas: "a b";
    }
    .product-list {
        grid-area: b;
    }
</style>
