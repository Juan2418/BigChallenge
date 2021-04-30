require('./bootstrap');
import Vue from 'vue';

new Vue(
    {
        el: '#root',
        mounted() {
            console.log('hello world!');
        }
    }
)
