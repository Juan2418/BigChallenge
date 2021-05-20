<template>
  <form class="flex flex-col py-4 md:py-60">
    <section class="flex flex-col w-full py-4">
      <label for="name">Your name:</label>
      <input type="text" id="name"
             @click="nameError = false"
             v-model="name"
             class="text-xl h-10">
      <p v-if="nameError" class="text-red-900 text-sm py-2">
        *Add your name.
      </p>
    </section>
    <section class="flex flex-col w-full py-2">
      <label for="number">CreditCard Number:</label>
      <input type="text" id="number"
             @click="creditcardError = false"
             v-model="creditCardNumber"
             class="text-xl h-10 w-full"
             maxlength="20">
      <p v-if="creditcardError" class="text-red-900 text-sm py-2">
        *Invalid credit card.
      </p>
    </section>
    <section class="grid grid-cols-1 md:gap-2 md:grid-cols-2 w-full py-2">
      <section class="flex flex-col w-full">
        <label for="cvv">Security code:</label>
        <section class="w-full flex flex-col">
          <input type="text"
                 id="cvv"
                 @click="cvvError = false"
                 v-model="cvv"
                 class="text-xl h-10"
                 maxlength="3">
          <p v-if="cvvError" class="text-red-900 text-sm py-2">
            *Invalid CVV.
          </p>
        </section>
      </section>
      <section class="flex flex-col w-full">
        <label for="expiration">Expiration date:</label>
        <input type="date" id="expiration" class="text-xl h-10"
               :min="new Date().toJSON().slice(0,10)">
      </section>
    </section>
    <button @click="payCreditCard" class="btn btn-primary py-4">Pay</button>
  </form>
</template>
<script>
export default {
  name: 'credit-card-form',
  props: {
    creditCardNumber: {},
    creditcardError: {},
    cvv: {},
    cvvError: {},
    name: {},
    nameError: {},
    payCreditCard: {}
  }
}
</script>
