<template>
    <div>
        <div class="container" style="margin-top: 15rem">
            <section class="docs-section ">
                <div style="white-space: nowrap;">
                    <h3 class="col-sm-5 docs-section-title text-center" style="text-overflow: ellipsis;overflow: hidden;" :alt="processName">{{ processName }}</h3>
                </div>
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="docs-info-container">
                            <div class="dropdown show">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                   id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Documente necesare

                                </a>
                                <ul class="dropdown-menu docs-dropdown col-12" aria-labelledby="dropdownMenuLink">

                                    <li>
                                        <label>
                                            <input type="checkbox"> Copie certificat nastere
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox"> Timbru
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox"> Cartea de identitate curenta
                                        </label>
                                    </li>

                                </ul>
                            </div>
                            <div class="dropdown show">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                   id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Conditii generale

                                </a>

                                <ul class="dropdown-menu docs-dropdown col-12" aria-labelledby="dropdownMenuLink">

                                    <li>Programare valida</li>
                                    <li>Carte de identitate</li>
                                    <li>Certificat de nastere</li>

                                </ul>
                            </div>
                            <div class="dropdown show">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                   id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Instiutiile care
                                    elibereaza

                                </a>

                                <ul class="dropdown-menu docs-dropdown col-12" aria-labelledby="dropdownMenuLink">
                                    <li>
                                        <label>
                                            <input type="checkbox"> Politia locala
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox"> Primaria
                                        </label>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-9 mt-3">
                            <button type="button" class="btn btn-route" @click="submit">Creeaza ruta</button>
                        </div>
                    </div>
                    <div class="col-md-4 sm-hidden ">
                        <img class="docs-img" src="/images/svg/document.svg">
                    </div>
                </div>
            </section>
        </div>

        <div class="container-fluid container-fluid-background mb-5">
            <div class="p-5">
                <div class="align-feedback">
                    <h2>Feedback-ul tau conteaza !</h2>
                    <a :href="feedbackLink" class="btn button-accent-secondary">Ofera feedback</a>
                </div>
            </div>
        </div>

        <div class="container my-5">
            <div class="row">

                <div class="flex align-items-center col-12 col-md-12 mt-3 mb-5">
                    <h2 class="text-center text-color-blue">Traseul meu</h2>
                </div>

            </div>
            <tom-map :generateRoute="requestMade"></tom-map>
        </div>
    </div>
</template>

<script>
import Statistics from "./StatisticsChart";

export default {
    name: "RoutePage",
    components: {Statistics},
    data() {
        return {
            requestMade: false
        }
    },
    computed: {
        processName() {
            const urlParams = new URLSearchParams(window.location.search);
            const myParam = urlParams.get('p');
            return myParam;
        },
        feedbackLink() {
            return `/feedback?p=${this.processName}`;
        }
    },
    methods: {
        submit() {
            this.requestMade = true;
        }
    }
}
</script>

<style scoped>

</style>
