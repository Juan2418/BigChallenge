<template>
    <div class="flex w-full m-1 md:m-6 card" @click="$emit('click')">
        <div class="w-full
                    bg-white
                    flex flex-col items-center
                    rounded overflow-hidden shadow-lg
                    scale-on-hover">
            <img class="md:w-1/2" :src="information.image" :alt="`${information.name} Image`">
            <div class="font-bold truncate text-xl px-2 mb-2">{{ information.name }}</div>
            <p class="py-2 md:px-4 w-full text-gray-700 text-base max-h-16 justify-self-start truncate">
                {{ information.description }}
            </p>
        </div>
    </div>
</template>

<script>
export default {
    name: "card",
    props: {
        information : Object
    }
}
</script>

<style scoped>

</style>
