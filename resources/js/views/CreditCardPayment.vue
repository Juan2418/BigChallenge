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
            <payment-validation-modals :error="requestError" :show-error="showError" :show-success="showSuccess"/>
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
            error: false,
            requestError: "",
            showError: false,
            showSuccess: false
        }
    },
    methods: {
        creditCardIsValid,
        async payCreditCard() {
            if (!creditCardIsValid(this.creditCardNumber) || this.creditCardNumber.length === 0) {
                this.error = true;
                return;
            }
            let response = await this.sendOrder(this.products);
            if (response === 200) {
                Store.productsToOrder = [];
                this.show = false;
                this.showSuccess = true;
                setTimeout(() => this.goToHome(), 2000);
            } else {
                this.requestError = response;
                this.showError = true;
            }
        }
    }
}
</script>

<style scoped>

</style>
