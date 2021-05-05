<template>
    <Main class="grid sm:grid-cols-1 sm:grid-col md:grid-cols-product p-5 layout-product shadow-md">
        <div>
            <section class="text-4xl py-4">
                {{ product.name }}
            </section>
            <section class="py-3">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda debitis doloremque eos facere,
                    facilis, maiores molestiae non, officiis saepe sequi soluta suscipit tempora tempore unde vitae.
                    Fuga omnis soluta voluptate?
                </p>
            </section>
            <section>
<!--            TODO: Turn this into a list of the product ingredients, after this the user should be able to deselect
                anything he/she does not like.-->

                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                <label for="vehicle1"> I have a bike</label><br>
            </section>
        </div>
        <div class="md:h-screen image-product">
            <img :src="product.image" :alt="`${product.name} image`" class="w-full bg-black">
        </div>
    </Main>
</template>

<script>
export default {
    data() {
        return {
            product: Store.productToAdd
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

    @media (max-width: 770px) {
        .layout-product {
            grid-template-areas: "b" "a";
        }
    }
</style>
