<template>
    <Main class="grid grid-cols-2 grid-cols-main bg-gray-200">
        <nav-bar></nav-bar>
        <section class="container h-screen overflow-y-scroll">
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
            <payment-validation-modals :error="error" :show-error="showError" :show-success="showSuccess"/>
        </section>
    </Main>
</template>

<script>
import NavBar from "../components/NavBar";
import ProductListHorizontal from "../components/ProductListHorizontal";
import Modal from "../components/Modal";
import 'animate.css';
import Card from "../components/Card";
import {goToHome, sendOrder} from "../utilities.js";
import PaymentValidationModals from "./PaymentValidationModals";


export default {
    name: "cart",
    components: {PaymentValidationModals, Card, Modal, ProductListHorizontal, NavBar},

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
        async payCash() {
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

