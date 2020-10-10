<template>
    <div>
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>Create Your account</h3>
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
                            <form class="login-form" v-on:submit.prevent="submit">
                                <div class="form-group">
                                    <div class="input-icon">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input id="employer"
                                                       type="radio"
                                                       v-model="form.role_id"
                                                       name="role_id"
                                                       value="2"
                                                       checked
                                                >
                                                Employer
                                            </div>
                                            <div class="col-md-6">
                                                <input id="candidate"
                                                       type="radio"
                                                       v-model="form.role_id"
                                                       name="role_id"
                                                       value="3"
                                                >
                                                Candidate
                                            </div>
                                        </div>
                                        <span class="text-danger" role="alert">
                                            <strong>{{ errors.role_id}}</strong>
                                        </span>
                                    </div>
                                </div><div class="form-group">
                                <div class="input-icon">
                                    <i class="lni-user"></i>
                                    <input
                                        id="name"
                                        type="text"
                                        class="form-control"
                                        v-model="form.name"
                                        name="name"
                                        autocomplete="name"
                                        autofocus
                                        placeholder="Name"
                                    >
                                    <span class="text-danger" role="alert">
                                            <strong>{{ errors.name }}</strong>
                                    </span>
                                </div>
                            </div>
                                <div class="form-group">
                                    <div class="input-icon">
                                        <i class="lni-envelope"></i>
                                        <input
                                            id="email"
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
                                <div class="form-group">
                                    <div class="input-icon">
                                        <i class="lni-unlock"></i>
                                        <input
                                            id="password-confirm"
                                            type="password"
                                            class="form-control"
                                            v-model="form.password_confirmation"
                                            name="password_confirmation"
                                            autocomplete="new-password"
                                            placeholder="Retype Password"
                                        >
                                        <span class="text-danger" role="alert">
                                            <strong>{{ errors.password_confirmation }}</strong>
                                        </span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-common log-btn"> Register
                                    <span v-if="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                </button>
                                <p class="text-center">Already have an account?<a><inertia-link href="login">Login</inertia-link></a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name: "Register",
    props: {
        errors: Object,
    },
    data () {
        return {
            loading: false,
            form: {
                role_id: '',
                name: '',
                email: '',
                password: '',
                password_confirmation: ''
            }
        }
    },
    methods: {
        submit() {
            this.loading = true
            this.$inertia.post('/register', {
                role_id: this.form.role_id,
                name: this.form.name,
                email: this.form.email,
                password: this.form.password,
                password_confirmation: this.form.password_confirmation
            })
            .then(() => this.loading = false)
            .catch(error => {
                console.log(error.response.status)
            })
        }
    }

    }
</script>

<style scoped>

</style>
