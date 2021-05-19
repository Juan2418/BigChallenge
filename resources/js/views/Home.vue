<template>
    <div class="grid grid-cols-2 grid-cols-main bg-gray-200">
        <nav-bar/>
        <categories></categories>
    </div>
</template>

<script>
import Categories from "./categories";
import NavBar from "../components/NavBar";

export default {
    components: {NavBar, Categories},
}
</script>

