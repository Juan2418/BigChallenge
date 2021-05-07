<template>
    <Main class="grid sm:grid-cols-1 sm:grid-col md:grid-cols-product
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
                <div v-for="(ingredient, i) in ingredients">
                    <input type="checkbox" :id="i" :name="ingredient.name" :value="ingredient.name"
                           v-model="ingredient.checked">
                    <label for="i">{{ ingredient.name }}</label><br>
                </div>
            </section>
            <section class="py-7 grid quantity-section items-center">
                <label for="quantity">
                    Select how many <span class="font-bold quantity-label sm:py-2">{{ product.name }}</span> you want:
                </label>
                <NumberInput id="quantity" :value="quantity" @add="increaseQuantity()"
                             @substract="decreaseQuantity"></NumberInput>
            </section>
            <button class="btn btn-primary w-full justify-self-center">Add to cart</button>
        </div>
        <div class="md:h-screen image-product">
            <img :src="product.image" :alt="`${product.name} image`" class="w-full bg-black">
        </div>
    </Main>
</template>

<script>
import NumberInput from "../components/NumberInput";

export default {
    components: {NumberInput},
    data() {
        return {
            product: Store.productToAdd,
            ingredients: [],
            quantity: 1
        }
    },
    mounted() {
        let ingredients = this.product.ingredients;
        for (let i = 0; i < ingredients.length; i++) {
            ingredients[i].checked = true;
        }
        this.ingredients = ingredients;
    },
    methods: {
        increaseQuantity() {
            this.quantity++;
        },
        decreaseQuantity(newValue) {
            this.quantity = newValue;
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
