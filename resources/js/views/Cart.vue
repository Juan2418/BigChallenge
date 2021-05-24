<template>
    <Main class="grid grid-cols-2 grid-cols-main bg-gray-200">
        <nav-bar></nav-bar>
        <section class="container h-screen overflow-y-scroll w-full">
            <order-form :amount-to-pay="amountToPay" :products="products" :show-payment-modal="showPaymentModal"/>
            <transition
                enter-active-class="animate__animated animate__slideInUp"
                leave-active-class="animate__animated animate__slideOutDown"
            >
                <modal v-if="show" @close="show = false">
                    <header slot="header">Select your payment method</header>
                    <section slot="body" class="grid grid-cols-1 gap-2 justify-items-center md:grid-cols-2 w-full">
                        <card :information="creditCardOption" @click="payCreditCard"></card>
                        <card :information="cashOption" @click="payCash"></card>
                    </section>
                </modal>
            </transition>
            <payment-validation-modals :error="error"
                                       :show-error="showError"
                                       @closeError="showError = false"
                                       :show-success="showSuccess"/>
        </section>
    </Main>
</template>

<script>
import NavBar from "../components/NavBar";
import Modal from "../components/Modal";
import 'animate.css';
import Card from "../components/Card";
import {goToHome, sendOrder} from "../utilities.js";
import PaymentValidationModals from "./PaymentValidationModals";
import OrderForm from "./OrderForm";


export default {
    name: "cart",
    components: {OrderForm, PaymentValidationModals, Card, Modal, NavBar},

    data() {
        return {
            products: Store.productsToOrder,
            show: false,
            creditCardOption: {
                name: "Credit Card",
                image: "icons/credit_card_black.svg",
                description: ""
            },
            cashOption: {
                name: "Cash",
                image: "icons/attach_money_black.svg",
                description: ""
            },
            error: "",
            showError: false,
            showSuccess: false
        }
    },
    computed: {
        amountToPay() {
            return this.products.reduce((acum, prod) => acum += prod.cost, 0);
        }
    },
    methods: {
        sendOrder,
        showPaymentModal() {
            this.show = true;
        },
        goToHome,
        prepareProducts() {
            this.products.forEach(product => {
                product.ingredients = product.ingredients.filter(item => item.checked);
            });
        },
        async payCash() {
            this.prepareProducts();
            let response = await this.sendOrder(this.products);
            if (response === 200) {
                Store.productsToOrder = [];
                this.show = false;
                this.showSuccess = true;
                setTimeout(() => this.goToHome(), 2000);
            } else {
                this.error = response;
                this.showError = true;
            }
        },
        payCreditCard() {
            SPA.$router.push('/pay/creditcard');
        }
    }
}
</script>

