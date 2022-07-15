<template>
    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <router-link to="/" class="navbar-brand">SPA</router-link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex" role="search">
                    <router-link to="/products" class="navbar-brand">Products</router-link>
                    <router-link to="/login" class="navbar-brand">Login</router-link>
                    <router-link to="/register" class="navbar-brand">Register</router-link>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name : 'Nav'
}
</script>