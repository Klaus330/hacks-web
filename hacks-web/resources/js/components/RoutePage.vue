<template>
    <div v-if="show">
        <div class="container" style="margin-top: 15rem">
            <section class="docs-section ">
                <div style="white-space: nowrap;">
                    <h3 class="col-sm-5 docs-section-title text-center"
                        style="text-overflow: ellipsis;overflow: hidden;" :alt="processName">{{ processName }}</h3>
                </div>
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="docs-info-container">
                            <div class="dropdown show">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                   id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Documente necesare

                                </a>
                                <ul v-for="(documents,index) in necessary[selectedCaseId]" :key="index" class="dropdown-menu docs-dropdown" style="list-style-type: none; padding:0; max-height: 300px; overflow-y: scroll; ">
                                    <li v-for="(document,index) in documents" :key="index" class="dropdown-item-docs p-2">
                                        <input type="checkbox" @change="selectDoc($event,document)"> {{document}}
                                    </li>
                                </ul>
                            </div>
                            <div class="dropdown show">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                   id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Tip Persoana

                                </a>
                                <ul class="dropdown-menu docs-dropdown col-12" aria-labelledby="dropdownMenuLink">
                                    <li>
                                        <input type="checkbox" @change="selectPersonType('fizic')"> Fizica
                                    </li>
                                    <li>
                                        <input type="checkbox" @change="selectPersonType('juridic')"> Juridica
                                    </li>
                                </ul>
                            </div>
                            <div class="dropdown show">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                   id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Conditii generale

                                </a>

                                <ul class="dropdown-menu docs-dropdown col-12" aria-labelledby="dropdownMenuLink">

                                    <li v-for="(info,index) in generalInfo[selectedCaseId]" :key="index"
                                        class="panel-item">
                                        <p>{{ info }}</p>
                                    </li>

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
                                        <input type="checkbox"
                                               @change="selectInstitution($event, pageInfo.institution)" checked> {{
                                            pageInfo.institution
                                        }}
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
            <tom-map :generateRoute="requestMade" :requestData="requestData"></tom-map>
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
            requestMade: false,
            pageInfo: [],
            requestData: {
                avoidVignette: ["AUS", "CHE"],
                currentLatitude: null,
                currentLongitude: null,
                institutions: []
            },
            personType: null,
            selectedDocuments: [],
            generalInfo: [],
            necessary: [],
            selectedCaseId: 0,
            show: false
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
    mounted() {
        this.getCurrentLocation();
        this.fetchData();
    },
    methods: {
        submit() {
            this.requestMade = true;
        },

        fetchData() {
            axios.get(`/get-process-by-name?p=${this.processName}`)
                .then((response) => {
                    console.log(response);
                    this.pageInfo = response.data;
                    this.parseData();
                })
        },

        parseData() {
            this.generalInfo = this.pageInfo.generalInfo;
            this.necessary = this.pageInfo.necessary;
            axios
                .get(`/get-institution-by-name?i=${this.pageInfo.institution}`)
                .then((response) => {
                    this.requestData.institutions.push(response.data.id);
                });
            this.show = true;
        },

        getCurrentLocation() {
            navigator.geolocation.getCurrentPosition(this.getLocation);
        },

        getLocation(position) {
            console.log(position);
            this.requestData.currentLatitude = position.coords.latitude;
            this.requestData.currentLongitude = position.coords.longitude;
        },
        selectInstitution(event, institutionName) {
            if (event.target.checked) {
                axios
                    .get(`/get-institution-by-name?i=${institutionName}`)
                    .then((response) => {
                        this.requestData.institutions.push(response.data.id);
                    });
            } else {
                axios
                    .get(`/get-institution-by-name?i=${institutionName}`)
                    .then((response) => {
                        const index = this.requestData.institutions.indexOf(response.data.id);
                        if (index > -1) {
                            this.requestData.institutions.splice(index, 1);
                        }
                    });
            }
        },
        selectPersonType(type) {
            this.personType = type;
        },
        selectDoc(event, doc) {
            if (event.target.checked) {
                this.selectedDocuments.push(doc);
            } else {
                const index = this.selectedDocuments.indexOf(doc);
                if (index > -1) {
                    this.selectedDocuments.splice(index, 1);
                }
            }
        }
    }
}
</script>

<style scoped>

</style>
