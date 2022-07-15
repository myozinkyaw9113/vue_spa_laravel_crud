<template>
    <div class="container mx-auto m-5" style="max-width:576px">
        <div class="shadow p-5 mb-5 bg-body rounded">
            <h1 class="mb-4 text-center">Sign In {{ firstName }}</h1>
            <form>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="inputPassword3">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Sign In</button>
            </form>
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex';
export default {
    name : 'Login',
    computed : {
        ...mapState('auth', {
            firstName : (state) => state.name
        })
    }
}
</script>