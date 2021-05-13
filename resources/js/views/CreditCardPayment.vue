<template>
    <Main class="grid grid-cols-2 grid-cols-main bg-gray-200">
        <nav-bar></nav-bar>
        <section class="container h-screen overflow-y-scroll">
            <section class="flex flex-col py-60">
                <input type="text" @click="error = false" v-model="creditCardNumber" class="text-xl h-10" maxlength="20">
                <p v-if="error" class="text-red-900 text-sm py-2">
                    *Invalid credit card.
                </p>
                <button @click="payCreditCard" class="btn btn-primary py-4">Pay</button>
            </section>

        </section>

    </Main>
</template>

<script>
import NavBar from "../components/NavBar";
import {creditCardIsValid} from '../utilities.js';

export default {
    name: "creditcard-payment",
    components: {NavBar},
    data() {
        return {
            creditCardNumber: "",
            error: false
        }
    },
    methods: {
        creditCardIsValid,
        payCreditCard() {
            if (!creditCardIsValid(this.creditCardNumber) || this.creditCardNumber.length === 0) {
                this.error = true;
                return;
            }
            this.sendOrder(Store.productsToOrder);
            Store.productsToOrder = [];
            this.goToHome();
        }
    }
}
</script>

<style scoped>

</style>
