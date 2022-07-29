<template>
   <div class="container mx-auto m-5" style="max-width:576px">
        <div class="shadow p-5 mb-5 bg-body rounded">
            <h1 class="mb-4 text-center">{{ $t('register') }}</h1>
            <form>
                <div class="row mb-3">
                    <label for="uesrname" class="col-sm-4 col-form-label">{{ $t('username') }}</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="uesrname">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-4 col-form-label">{{ $t('email') }}</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="email">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-sm-4 col-form-label">{{ $t('password') }}</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="password">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="confirm_password" class="col-sm-4 col-form-label">{{ $t('confirm_password') }}</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="confirm_password">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">{{ $t('register') }}</button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name : 'Register',
    methods : {
        setLocale(locale) {
            this.$i18n.locale = locale
            localStorage.setItem('locale', locale)
        },
    }
}
</script>