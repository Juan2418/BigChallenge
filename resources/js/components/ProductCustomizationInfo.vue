<template>
    <article>
        <section class="text-4xl py-4">
            {{ product.name }}
        </section>
        <section class="py-3">
            {{ product.description }}
        </section>
        <section>
            <h1 class="font-bold py-3">Customize your product:</h1>
            <checkbox :ingredients="ingredients"/>
        </section>
    </article>
</template>
<script>
import Checkbox from "./Checkbox"

export default {
    name: 'product-customization-info',
    components: {Checkbox},
    props: {
        ingredients: {},
        product: {}
    }
}
</script>
<style scoped>

@media (max-width: 770px) {

}
</style>
