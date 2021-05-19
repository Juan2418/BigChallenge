<template>
    <section>
        <div v-for="product in products"
             class="max-w-sm w-full lg:max-w-full lg:flex my-4 scale-on-hover"
             @click="modifyProduct(product)"
        >
            <img v-if="$mq !== 'sm'"
                class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l
                           bg-primary
                           border-4 border-primary text-center overflow-hidden"
                :src="product.image"
                :title="`Product ${product.name}`"
            >
            <div
                class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400
                           bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4
                           w-full
                           flex flex-col justify-between leading-normal"
            >
                <div class="mb-8">
                    <div class="text-gray-900 font-bold text-xl mb-2">{{ product.name }}</div>
                    <section class="flex flex-col justify-between h-full">
                        <p class="text-gray-700 text-base">
                            {{ product.description }}
                        </p>
                        <div class="text-sm">
                            <p class="text-gray-900 leading-none">
                                Quantity:
                                <span class="text-gray-600 font-bold">{{ product.quantity }}</span>
                            </p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import {modifyProduct} from "../utilities";

export default {
    name: 'product-list-horizontal',
    props: {
        products: {}
    },
    methods: {
        modifyProduct
    }
}
</script>
