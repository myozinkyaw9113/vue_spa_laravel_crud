<template>
    <nav-bar></nav-bar>
    <router-view></router-view>
</template>

<script>
import Nav from './pages/Nav.vue'
export default {
    name : 'App',
    components : {
        'nav-bar' : Nav
    },

    created() {
        const locale = localStorage.getItem('locale');
        if (locale) {
            this.$i18n.locale = locale
        }
    }
}
</script>