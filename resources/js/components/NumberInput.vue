<template>
        <section class="flex flex-row m-2 justify-center h-full text-xl ">
            <img :src="'icons/add_black.svg'" class="text-white fill-current " @click="add()"/>
            <input type="number" v-model="currentValue" min="0" class="text-center font-weight-bolder mx-3 shadow bg-gray-200 w-1/4">
            <img :src="'icons/remove_black.svg'" @click="substract()"/>
        </section>
</template>

<script>
export default {
    data() {
        return {
            currentValue: 0
        }
    },
    props: {
        value: Number
    },
    mounted() {
        this.currentValue = this.value;
    },
    methods: {
        add() {
            this.$emit('add', ++this.currentValue);
        },
        substract() {
            if (this.currentValue > 0) {
                this.$emit('substract', --this.currentValue);
            }
        }
    }
}
</script>

<style scoped>

</style>
