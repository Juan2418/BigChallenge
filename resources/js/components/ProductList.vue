<template>
    <div class="flex w-full md:w-auto m-1 md:m-6" @click="setCurrentProductToAdd()">
        <div class="md:max-w-xs
                    bg-white
                    flex flex-col items-center
                    rounded overflow-hidden shadow-lg
                    scale-on-hover">
            <img class="w-full md:w-1/2 h-52" :src="product.image" :alt="`${product.name} Image`">
            <div class="truncate font-bold text-xl px-2 mb-2">{{ product.name }}</div>
            <p class="py-2 px-2 md:px-4 w-full text-gray-700 text-base max-h-16 justify-self-start truncate">
                {{ product.description }}
            </p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {}
    },
    props: {
        product: Object
    },
    methods: {
        setCurrentProductToAdd() {
            Store.$data.productToAdd = this.product;
            SPA.$router.push('/add-product');
        }
    }
}
</script>

<style scoped>
    .card{
        height: 20vh;
    }
</style>
