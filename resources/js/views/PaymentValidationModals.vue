<template>
    <article>
        <transition
            enter-active-class="animate__animated animate__jackInTheBox"
            leave-active-class="animate__animated animate__slideOutDown"
        >
            <modal v-if="showError" @close="showError = false">
                <header slot="header" class="font-bold text-red-800 text-center">An error has occurred</header>
                <section slot="body" class="grid grid-cols-1 gap-2 justify-items-center md:grid-cols-2 w-full">
                    <img :src="'icons/error_red.svg'" alt="error" class="w-full">
                    <p>{{ error }}</p>
                </section>
            </modal>
        </transition>
        <transition
            enter-active-class="animate__animated animate__zoomIn"
            leave-active-class="animate__animated animate__slideOutDown"
        >
            <img v-if="showSuccess" :src="'icons/check_circle_green.svg'" alt="success" class="w-full">
        </transition>
    </article>
</template>
<script>
import Modal from "../components/Modal"

export default {
  name: 'payment-validation-modals',
  components: {Modal},
  props: {
    error: {},
    showError: {},
    showSuccess: {}
  }
}
</script>
