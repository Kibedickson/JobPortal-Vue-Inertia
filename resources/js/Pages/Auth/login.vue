<template>
    <div>
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>Login</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section id="content" class="section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6 col-xs-12">
                        <div class="page-login-form box">
                            <form class="login-form" @submit.prevent="submit">
                                <div class="form-group">
                                    <div class="input-icon">
                                        <i class="lni-user"></i>
                                        <input
                                            id="sender-email email"
                                            type="email"
                                            class="form-control"
                                            v-model="form.email"
                                            name="email"
                                            autocomplete="email"
                                            placeholder="Email Address"
                                        >
                                        <span class="text-danger" role="alert">
                                            <strong>{{ errors.email }}</strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-icon">
                                        <i class="lni-lock"></i>
                                        <input
                                            id="password"
                                            type="password"
                                            ref="password"
                                            class="form-control"
                                            v-model="form.password"
                                            name="password"
                                            autocomplete="new-password"
                                            placeholder="Password"
                                        >
                                        <span class="text-danger" role="alert">
                                            <strong>{{ errors.password }}</strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group form-check">
                                    <input class="form-check-input" v-model="form.remember" type="checkbox" name="remember" id="remember">

                                    <label class="form-check-label" for="remember">Remember Me</label>
                                </div>
                            <button type="submit" class="btn btn-common log-btn"> Login
                                <span v-if="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            </button>
                            </form>
                            <p class="text-center">Don't have an account? <a><inertia-link href="register">Register</inertia-link></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    export default {
        name: "login",
        components: {
        },
        props: {
            errors: Object,
        },
        data () {
            return {
                loading: false,
                form: {
                    email: '',
                    password: '',
                    remember: null
                }
            }
        },
        methods: {
            submit(){
                this.loading = true
                this.$inertia.post('/login', {
                    email: this.form.email,
                    password: this.form.password,
                    remember: this.form.remember
                })
                .then(() => this.loading = false)
            },
        },
    }
</script>

<style scoped>

</style>
