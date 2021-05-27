<template>
    <form class="login-form simple-form" action="/login" method="post">
        <input type="hidden" name="_token" v-bind:value="csrfToken">

        <div class="row d-flex justify-content-center align-items-center" v-if="hasErrors()">
            <div class="alert alert-danger col-12 col-lg-7">
                <ul v-for="error in errors" :key="error[0]">
                    <li>{{ error[0] }}</li>
                </ul>
            </div>
        </div>

        <div class="row d-flex justify-content-center align-items-center">
            <div class="auth-item mb-4 col-12 col-lg-7">
                <input type="email" name="email" placeholder="email" class="input-form" v-model="form.email" required/>
            </div>
        </div>

        <div class="row d-flex justify-content-center align-items-center">
            <div class="auth-item mb-4 col-12 col-lg-7">
                <input type="password" name="password" placeholder="password" class="input-form" v-model="form.password"
                       required/>
            </div>
        </div>


        <div class="row d-flex justify-content-center align-items-center">
            <div class="auth-item mb-4 col-12 col-lg-7">
                <vue-loading-button class="auth-button" aria-label='Login' @click.native="submitLogin"
                                    :loading="isLoading">Logare
                </vue-loading-button>
            </div>
        </div>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="auth-item col-12 col-lg-7">
                <a class="btn auth-button" href="/register">Creează cont nou</a>
            </div>
        </div>
    </form>
</template>

<script>
import Swal from 'sweetalert2';

export default {
    name: "LoginForm",
    components: {Swal},
    data() {
        return {
            csrfToken: '',
            isLoading: false,
            form: {
                _token: '',
                email: '',
                password: ''
            },
            errors: {}
        };
    },
    methods: {
        submitLogin() {
            this.isLoading = true;

            axios.post('/login', this.form)
                .then((response) => {
                    this.isLoading = false;
                    Swal.fire({
                        title: response.data.message,
                        confirmButtonText: "Ok"
                    }).then(() => {
                        window.location = "/";
                    })
                })
                .catch(({response}) => {
                    this.errors = response.data.errors;
                    this.isLoading = false;
                    Swal.fire({
                        icon: 'error',
                        title:"Oops...",
                        text: response.data.error.message,
                        confirmButtonText: "Ok"
                    });

                });
        },
        hasErrors() {
            return (this.errors !== undefined ) && !(this.errors && Object.keys(this.errors).length === 0 && this.errors.constructor === Object);
        }
    }
}
</script>

<style scoped>
.vue-loading-button {
    font-size: 18px;
    background: #fff;
    color: #2148c0;
}

.vue-loading-button:hover {
    background: transparent;
    border: 1px solid white;
    color: white;
}

.default-styles {
    background: #fff;
    color: #2148c0;
}

.loading {
    background: transparent;
    color: #2148c0;
}
</style>
