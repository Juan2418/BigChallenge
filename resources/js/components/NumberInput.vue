<template>
    <section>
        <section class="flex m-2">
            <input type="number" v-model="currentValue" min="0" class="text-right shadow">
            <section class="flex flex-row">
                <img :src="'icons/add_black.svg'" @click="add()"/>
                <img :src="'icons/remove_black.svg'" @click="substract()"/>
            </section>
        </section>
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
