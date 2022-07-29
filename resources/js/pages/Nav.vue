<template>
    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <router-link to="/" class="navbar-brand">{{ $t('spa') }}</router-link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex" role="search">
                    <router-link to="/products" class="nav-link">{{ $t('products') }}</router-link>
                    <router-link to="/login" class="nav-link">{{ $t('login') }}</router-link>
                    <router-link to="/register" class="nav-link">{{ $t('register') }}</router-link>
                    <select @change="setLocale(selectedLan)" v-model="selectedLan">
                        <option 
                        v-for="(lan,i) in languages" 
                        :key="i"
                        :value="lan.value"
                        >
                        {{ lan.text }}
                        </option>
                    </select>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name : 'Nav',

    data() {
        return {
            selectedLan : null,
            languages : [
                { text: 'English', value: 'en' },
                { text: 'Myanmar', value: 'mm' },
            ]
        }
    },

    methods : {
        setLocale(locale) {
            this.$i18n.locale = locale
            localStorage.setItem('locale', locale)
        },
    }
}
</script>