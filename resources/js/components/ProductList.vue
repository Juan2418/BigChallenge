<template>
    <portal to="productList">
        <div>
            <p>{{ list.name }}</p>
            <p>Hola Mundo</p>
        </div>
    </portal>
</template>

<script>
export default {
    data() {
        return {
            list: null
        }
    },
    props: {
        products: Array
    },
    mounted() {
        console.log(this.products[0]);
        this.list = this.products[0];
    }
}
</script>

<style scoped>

</style>
