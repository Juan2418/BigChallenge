<template>
    <Main>
        <header><h1 class="text-6xl font-extrabold m-3">Choose your product category:</h1></header>
        <section class="grid grid-cols-1 md:grid-cols-3 gap-4 absolute w-15">
            <div v-for="category in categories"
                 class="bg-primary text-secondary font-extrabold text-lg text-md-center
                 p-4 text-center grid grid-cols-1
                 rounded-lg transform transition duration-500 hover:scale-110">
                <img :src=getCategoryImage(category) alt="Category image" width="100px">
                <hr class="mt-3" />
                {{ category.name }}
            </div>
        </section>
    </Main>
</template>

<script>
export default {
    data() {
        return {
            categories: []
        }
    },

    mounted() {
        axios.get('/categories').then(({data}) => this.categories = data)
    },
    methods: {
        getCategoryImage(category) {
            return `${category.image}`;
        }
    }

}
</script>
