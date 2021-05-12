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


export default {
    name: "cart",
    components: {Card, Modal, ProductListHorizontal, NavBar},

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
            }
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
        payCash() {
            this.sendOrder(this.products);
            Store.productsToOrder = [];
            this.goToHome();
        },
        payCreditCard() {
            SPA.$router.push('/pay/creditcard');
        }
    }
}
</script>

