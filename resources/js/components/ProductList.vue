<template>
    <div class="m-6" @click="setCurrentProductToAdd()">
        <!--Card 1-->
        <div class="max-w-xs
                    flex flex-col items-center
                    rounded overflow-hidden shadow-lg
                    transform transition duration-500 hover:scale-110">
            <img class="w-1/2" :src="'icons/warning_black.svg'" :alt="`${product.name} Image`">
            <div class="font-bold text-xl mb-2">{{ product.name }}</div>
            <p class="py-2 px-4 w-full text-gray-700 text-base max-h-16 justify-self-start truncate">
                {{ product.description }}
            </p>
        </div>
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

</style>
