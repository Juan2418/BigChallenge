<template>
    <Main class="grid grid-cols-2 grid-cols-main bg-gray-200">
        <nav-bar></nav-bar>
        <section  class="grid sm:grid-cols-1 sm:grid-col md:grid-cols-product
                p-5 md:text-2xl layout-product
                shadow-md overflow-y-scroll h-screen">
            <div>
                <section class="text-4xl py-4">
                    {{ product.name }}
                </section>
                <section class="py-3">
                    <p>
                        {{ product.description }}
                    </p>
                </section>
                <section>
                    <h1 class="font-bold py-3">Customize your product:</h1>
                    <checkbox :ingredients="ingredients"/>
                </section>
                <section class="py-4">
                    <p>Product Cost: <span class="font-bold">{{ totalCost }}</span></p>
                </section>
                <section class="py-7 grid quantity-section items-center">
                    <label for="quantity">
                        Select how many <span class="font-bold quantity-label sm:py-2">{{ product.name }}</span> you
                        want:
                    </label>
                    <NumberInput id="quantity" :value="quantity" @add="increaseQuantity()"
                                 @substract="decreaseQuantity"></NumberInput>
                </section>
                <button class="btn btn-primary w-full justify-self-center"
                        @click="modifyCart"
                >
                    Modify
                </button>
            </div>
            <div class="md:h-screen flex justify-center image-product ">
                <img :src="product.image" :alt="`${product.name} image`" class="w-full h-content md:w-1/2 bg-black">
            </div>
        </section>
    </Main>
</template>

<script>
import NumberInput from "../components/NumberInput";
import NavBar from "../components/NavBar";
import Checkbox from "../components/Checkbox";
import {goToHome} from "../utilities";

export default {
    components: {Checkbox, NavBar, NumberInput},
    data() {
        return {
            product: Store.productToModify,
            ingredients: [],
            indexInList: -1,
            quantity: Store.productToModify.quantity,
            previousRoute: '/'
        }
    },
    computed: {
        totalCost() {
            return this.product.cost * this.quantity;
        }
    },
    mounted() {
        this.ingredients = this.product.ingredients;
        this.indexInList = this.product.indexInList;
    },
    methods: {
        increaseQuantity() {
            this.quantity++;
        },
        decreaseQuantity(newValue) {
            this.quantity = newValue;
        },
        addToCart() {
            if (this.quantity > 0) {
                let productToAdd = {
                    id: this.product.id,
                    name: this.product.name,
                    image: this.product.image,
                    cost: this.totalCost,
                    description: this.product.description,
                    ingredients: this.ingredients,
                    quantity: this.quantity
                };
                Store.productsToOrder.push(productToAdd);
            }
        },
        getProductIndex() {

        },
        removeSelfFromCart() {
            Store.productsToOrder.splice(this.indexInList, 1);
        },
        resetProductToModify() {
            Store.productsToModify = null;
        },
        modifyCart() {
            this.removeSelfFromCart();
            this.addToCart();
            this.resetProductToModify();
            goToHome();
        },
        previousViewWasCart() {
            return SPA.previousRoute === '/cart';
        },
    },
    beforeRouteEnter(to, from, next) {
        SPA.previousRoute = from.path;
        next();
    },
    beforeRouteLeave(to, from, next){
        if (this.previousViewWasCart()) {
            SPA.previousRoute = '/modify';
            next('/cart');
        } else {
            next();
        }
    }
}
</script>

<style scoped>
.layout-product {
    grid-template-areas: "a b";
}

.image-product {
    grid-area: b;
}

.quantity-section {
    grid-template-areas: "a b";
}

.quantity-label {
    grid-area: b;
}

@media (max-width: 770px) {
    .layout-product {
        grid-template-areas: "b" "a";
    }

    .quantity-section {
        grid-template-areas: "a" "b";
    }
}
</style>
