<template>
    <Main class="grid grid-cols-product p-5">
        <div>
            <h1>
                {{ product.name }}
            </h1>
        </div>
        <div class="h-screen">
            <img :src="product.image" :alt="`${product.name} image`" class="w-full bg-black">
        </div>
    </Main>
</template>

<script>
export default {
    data() {
        return {
            product: Store.productToAdd
        }
    }
}
</script>

<style scoped>

</style>
