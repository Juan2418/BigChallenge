<template>
    <Main class="grid grid-cols-2 grid-cols-main bg-gray-200">
        <nav-bar></nav-bar>
        <section class="container h-screen overflow-y-scroll">
            <credit-card-form :credit-card-number="creditCardNumber"
                              :creditcard-error="creditcardError"
                              :cvv="cvv"
                              :cvv-error="cvvError"
                              :name="name"
                              :remove-functions="{removeCvvError, removeNameError, removeCreditCardError}"
                              :name-error="nameError"
                              :pay-credit-card="payCreditCard"
            />
            <payment-validation-modals :error="requestError"
                                       :show-error="showError"
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
            creditCardNumber: "",
            creditcardError: false,
            requestError: "",
            showError: false,
            showSuccess: false,
            cvv: "",
            expiration: "",
            name: "",
            nameError: false,
            cvvError: false
        }
    },
    methods: {
        creditCardIsValid,
        sendOrder,
        goToHome,
        removeCreditCardError() {this.creditcardError = false},
        removeNameError() {this.nameError = false},
        removeCvvError() {this.cvvError = false},
        CVVOnlyDigits() {
            return /^\d+$/g.test(this.cvv);
        },
        fieldsAreValid() {
            if (this.name.length === 0) {
                this.nameError = true;
            }
            if (this.cvv.length != 3 || !this.CVVOnlyDigits()) {
                this.cvvError = true;
            }
            if (this.creditCardNumber.length === 0 || !creditCardIsValid(this.creditCardNumber)) {
                this.creditcardError = true;
            }
            return !(this.cvvError || this.creditcardError || this.nameError);
        },
        async payCreditCard() {
            if (!this.fieldsAreValid()) {
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

