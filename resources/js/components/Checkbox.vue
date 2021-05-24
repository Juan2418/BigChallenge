<template>
    <div>
        <div v-for="(ingredient, i) in ingredients">
            <input type="checkbox" :id="i" :name="ingredient.name" :value="ingredient.name"
                   v-model="ingredient.checked">
            <label for="i">{{ ingredient.name }}</label><br>
        </div>
    </div>
</template>
<script>
export default {
    name: 'checkbox',
    props: {
        ingredients: {}
    }
}
</script>
<style scoped>

</style>
