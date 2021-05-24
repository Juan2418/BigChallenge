<template>
    <Main class="grid grid-cols-2 grid-cols-main bg-gray-200">
        <nav-bar></nav-bar>
        <section class="container h-screen overflow-y-scroll">
            <credit-card-form @valid="payCreditCard"
            />
            <payment-validation-modals :error="requestError"
                                       :show-error="showError"
                                       @closeError="showError = false"
                                       :show-success="showSuccess"
            />
        </section>
    </Main>
</template>

<script>
import NavBar from "../components/NavBar";
import PaymentValidationModals from "./PaymentValidationModals";
import {creditCardIsValid, goToHome, sendOrder} from '../utilities.js';
import CreditCardForm from "./CreditCardForm";

export default {
    name: "creditcard-payment",
    components: {CreditCardForm, PaymentValidationModals, NavBar},
    data() {
        return {
            products: Store.productsToOrder,
            requestError: "",
            showError: false,
            showSuccess: false,
        }
    },
    methods: {
        sendOrder,
        goToHome,
        async payCreditCard() {
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

