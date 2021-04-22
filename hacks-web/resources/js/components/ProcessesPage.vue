<template>
    <div>
        <div class="container">
            <section class="row docs-section flex justify-content-center align-items-center" style="min-height: 100vh;">
                <div class="col-12">
                    <autocomplete-search url="/get-docs" filterby="name"
                                         v-on:optionSelected="showDetails"></autocomplete-search>
                </div>
            </section>
        </div>
        <div class="container" v-if="hasOption">
            <div>
                <h3 class="col-sm-3 docs-section-title text-center">Pro Tips</h3>
            </div>
            <div class="col-12">
                <ol class="panel ">


                    <li class="panel-item"><img style="margin-right: 10px" src="/images/svg/alert.svg"> Cerere pentru
                        eliberarea
                        actului de identitate
                    </li>
                    <li class="panel-item"><img style="margin-right: 10px" src="/images/svg/alert.svg"> Cerere pentru
                        eliberarea
                        actului de identitate
                    </li>
                    <li class="panel-item"><img style="margin-right: 10px" src="/images/svg/alert.svg"> Cerere pentru
                        eliberarea
                        actului de identitate
                    </li>

                </ol>
            </div>
        </div>
        <div class="container-fluid container-fluid-background my-5" v-if="hasOption">
            <div class="p-5">
                <div class="align-feedback">
                    <h2>Feedback-ul tau conteaza !</h2>
                    <a href="#" class="btn button-accent-secondary">Ofera feedback</a>
                </div>
            </div>
        </div>
        <div class="container">
            <section class="docs-section" v-if="hasOption">
                <div>
                    <h3 class="col-sm-5 docs-section-title text-center">{{ processName }}</h3>
                </div>
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="docs-info-container">
                            <div class="dropdown show">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                   id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Documente necesare

                                </a>
                                <ol class="dropdown-menu docs-dropdown col-12" aria-labelledby="dropdownMenuLink">

                                    <li class="dropdown-item">- Cerere pentru eliberarea actului de identitate</li>
                                    <li class="dropdown-item">- Certificatul de nastere(fotocopie si original)</li>

                                    <li class="dropdown-item">- Documentul cu care solicitantul face dovada adresei de
                                        domiciliu
                                    </li>
                                    <li class="dropdown-item">- Daca gazduitorul nu se poate prezenta la serviciul
                                        public comunitar de evidenta a persoanelor, declaratia de primire in spatiu
                                        poate fi
                                        consemnata la notarul public, la misiunea diplomatica sau oficiul consular al
                                        Romaniei
                                        din strainatare sauu in prezenta politistului de la postul de politie pentru
                                        mediul
                                        rural.
                                    </li>

                                </ol>
                            </div>
                            <div class="dropdown show">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                   id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Conditii generale

                                </a>

                                <ol class="dropdown-menu docs-dropdown col-12" aria-labelledby="dropdownMenuLink">

                                    <li class="dropdown-item">- Cerere pentru eliberarea actului de identitate</li>
                                    <li class="dropdown-item">- Certificatul de nastere(fotocopie si original)</li>

                                    <li class="dropdown-item">- Documentul cu care solicitantul face dovada adresei de
                                        domiciliu
                                    </li>
                                    <li class="dropdown-item">- Daca gazduitorul nu se poate prezenta la serviciul
                                        public comunitar de evidenta a persoanelor, declaratia de primire in spatiu
                                        poate fi
                                        consemnata la notarul public, la misiunea diplomatica sau oficiul consular al
                                        Romaniei
                                        din strainatate sau in prezenta politistului de la postul de politie pentru
                                        mediul
                                        rural.
                                    </li>

                                </ol>
                            </div>
                            <div class="dropdown show">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                   id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Instiutiile care
                                    elibereaza

                                </a>

                                <ol class="dropdown-menu docs-dropdown col-12" aria-labelledby="dropdownMenuLink">

                                    <li class="dropdown-item">- Serivciul public comunitar de evidenta a persoanelor.
                                    </li>

                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 sm-hidden ">
                        <img class="docs-img" src="/images/svg/document.svg">
                    </div>
                </div>
            </section>
        </div>


    </div>
</template>

<script>
import Autocomplete from "./Autocomplete";

export default {
    name: "ProcessesPage",
    components: {Autocomplete},
    data() {
        return {
            hasOption: false,
            processName: ''
        }
    },
    methods: {
        showDetails(process) {
            this.processName = process;
            this.hasOption = true;
        }
    }
}
</script>

<style scoped>

</style>
