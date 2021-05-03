import VueRouter from "vue-router";

let routes = [
    {
        path: '/',
        component: require('./views/categories.vue'),
    }
];

export default new VueRouter({
    routes
});
