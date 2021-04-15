<template>
    <form class="login-form simple-form" action="/register" method="post">
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
                <input type="text" name="name" placeholder="Name" class="input-form" required v-model="form.name"/>
            </div>
        </div>

        <div class="row d-flex justify-content-center align-items-center">
            <div class="auth-item mb-4 col-12 col-lg-7">
                <input type="text" name="surname" placeholder="Surname" class="input-form" required  v-model="form.surname"/>
            </div>
        </div>

        <div class="row d-flex justify-content-center align-items-center">
            <div class="auth-item mb-4 col-12 col-lg-7">
                <input type="email" name="email" placeholder="email" class="input-form" required v-model="form.email"/>
            </div>
        </div>

        <div class="row d-flex justify-content-center align-items-center">
            <div class="auth-item mb-4 col-12 col-lg-7">
                <input type="text" name="username" placeholder="username" class="input-form" required  v-model="form.username"/>
            </div>
        </div>

        <div class="row d-flex justify-content-center align-items-center">
            <div class="auth-item mb-4 col-12 col-lg-7">
                <input type="password" name="password" placeholder="password" class="input-form" required  v-model="form.password"/>
            </div>
        </div>

        <div class="row d-flex justify-content-center align-items-center">
            <div class="auth-item mb-4 col-12 col-lg-7">
                <input type="password" name="password_confirmation" placeholder="Confirm Password"
                       class="input-form" required  v-model="form.password_confirmation"/>
            </div>
        </div>

        <div class="row d-flex justify-content-center align-items-center">
            <div class="mb-4 col-12 col-lg-7 ">
                <input type="checkbox" name="terms" required><span class="text-white ml-2" v-model="form.terms">I agree to the terms & conditions</span>
            </div>
        </div>

        <div class="row d-flex justify-content-center align-items-center">
            <div class="auth-item mb-4 col-12 col-lg-7">
                <vue-loading-button class="auth-button" aria-label='Create account' @click.native="submitRegister"
                                    :loading="isLoading">Create account
                </vue-loading-button>
            </div>
        </div>
    </form>
</template>

<script>
import Swal from 'sweetalert2';
export default {
name: "RegisterForm",
    components: [Swal],
    data() {
        return {
            csrfToken: '',
            isLoading: false,
            form: {
                _token: '',
                name:'',
                surname:'',
                email: '',
                username:'',
                password: '',
                password_confirmation:'',
                terms: false,
            },
            errors: {}
        };
    },
    methods:{
        submitRegister(){
            this.isLoading = true;

            axios.post('/register', this.form)
                .then((response) => {
                    this.isLoading = false;
                    console.log(response);
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
                });
        },
        hasErrors() {
            return !(this.errors && Object.keys(this.errors).length === 0 && this.errors.constructor === Object);
        }
    }
}
</script>

<style scoped>

</style>
