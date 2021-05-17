<template>
    <article>
        <p class="font-bold text-2xl my-4">Your products</p>
        <product-list-horizontal :products="products"/>
        <section class="py-4">
            <p>Total: <span class="font-bold">{{ amountToPay }}</span></p>
        </section>
        <button v-if="products.length > 0" class="btn btn-primary w-full justify-self-center"
                @click="showPaymentModal"
        >
            Order
        </button>
    </article>
</template>
<script>
import ProductListHorizontal from "../components/ProductListHorizontal"

export default {
    name: 'order-form',
    components: {ProductListHorizontal},
    props: {
        amountToPay: {},
        products: {},
        showPaymentModal: {}
    }
}
</script>
