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
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                   style="white-space: normal;"> Documente necesare (bifeaza documentele pe care le ai
                                    deja)

                                </a>
                                <ul v-for="(documents,index) in necessary[selectedCaseId]" :key="index"
                                    class="dropdown-menu docs-dropdown"
                                    style="list-style-type: none; padding:0; max-height: 300px; overflow-y: scroll; ">
                                    <li v-for="(document,index) in documents" :key="index"
                                        class="dropdown-item-docs p-2">
                                        <input type="checkbox" @change="selectDoc($event,document)">{{document}}
                                    </li>
                                </ul>
                            </div>
                            <div class="dropdown show" v-if="hasFiles">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                   id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                   style="white-space: normal;">Documente care pot fi descarcate

                                </a>
                                <ul class="dropdown-menu docs-dropdown"
                                    style="list-style-type: none; padding:0; max-height: 300px; overflow-y: scroll; ">
                                    <li v-for="(document,index) in files" :key="index" class="dropdown-item-docs p-2">
                                        <a @click.prevent="downloadFile(document)" style="cursor: pointer"
                                           class="quick-link">{{document}}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="dropdown show">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                   id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Condiții generale

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
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Instiuțiile care
                                    eliberează

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
                            <button type="button" class="btn btn-route" @click="submit">Creează ruta</button>
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
                    <a :href="feedbackLink" class="btn button-accent-secondary">Oferă feedback</a>
                </div>
            </div>
        </div>

        <div class="container my-5">
            <div class="row">

                <div class="flex align-items-center col-12 col-md-12 mt-3 mb-5">
                    <h2 class="text-center text-color-blue">Traseul meu</h2>
                </div>

            </div>
            <div class="position-relative">
                <tom-map :generateRoute="requestMade" :requestData="requestData"
                         v-on:routeCreated="addRouteItinerary"></tom-map>
                <div class="itinerary">
                    <h3>Itinerar</h3>
                    <div v-if="hasLocations">
                        <h6>I.Locatii</h6>
                        <ol class="list">
                            <li v-for="(location,index) in locations" :key="index">{{location}}</li>
                        </ol>
                    </div>
                    <div>
                        <h6>II. Documente necesare</h6>
                        <ul v-for="(documents,index) in necessary[selectedCaseId]" :key="index"
                            class="list">
                            <li v-for="(document,index) in documents" :key="index">
                                -{{document}}
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h6>III.Documente care pot fi descarcate</h6>
                        <ul class="list">
                            <li v-for="(document,index) in files" :key="index">
                                <a @click.prevent="downloadFile(document)" style="cursor: pointer" class="quick-link">{{document}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Statistics from "./StatisticsChart";
import Swal from "sweetalert2";

export default {
    name: "RoutePage",
    components: {Statistics},
    props:['userData'],
    data() {
        return {
            requestMade: false,
            pageInfo: [],
            requestData: {
                latitude: null,
                longitude: null,
                institution: '',
                necessary: []
            },
            selectedDocuments: [],
            generalInfo: [],
            necessary: [],
            selectedCaseId: 0,
            show: false,
            files: [],
            locations: [],
            acceptDownloading: false
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
        },
        hasFiles() {
            return (this.files !== undefined && this.files !== [] && this.files.length > 0);
        },
        hasLocations() {
            return (this.locations !== undefined && this.locations.length > 0);
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

        addRouteItinerary(geo) {
            let features = geo.features;
            for (let i = 1; i < features.length - 1; i++) {

                if (features[i].geometry.type == "Point") {
                    if (features[i + 1].geometry.type != "LineString") {
                        this.locations.push(features[i].properties.name);

                    } else {
                        this.locations.push(features[i].properties.name);
                    }
                }
            }
        },

        fetchData() {
            axios.get(`/get-process-by-name?p=${this.processName}`)
                .then((response) => {
                    this.pageInfo = response.data;
                    this.parseData();
                })
        },

        parseData() {
            this.generalInfo = this.pageInfo.generalInfo;
            this.necessary = this.pageInfo.necessary;
            this.requestData.necessary = [...this.necessary[this.selectedCaseId][0]];
            this.files = this.pageInfo.files;
            axios
                .get(`/get-institution-by-name?i=${this.pageInfo.institution}`)
                .then((response) => {
                    this.requestData.institution = response.data.id;
                });
            this.show = true;
        },

        downloadFile(file) {
            axios.post("/get-file-link", {fileName: `${this.pageInfo.institution}_${file}`}).then((response) => {
                if(this.userData != null){
                    console.log(this.userData);
                    let payload = {
                        nume: this.userData.name,
                        prenume: this.userData.surname,
                        dataNastere: this.userData.dataNastere,
                        ziCurenta: "",
                        judet: this.userData.judet,
                        localitate: this.userData.localitate,
                        telefon: this.userData.phone,
                        email: this.userData.email,
                        adresa: this.userData.address,
                        cnp: this.userData.cnp,
                        serie: this.userData.serieBuletin,
                        numar_buletin: this.userData.numarBuletin,
                        url: response.data
                    };


                    axios.post('/get-autocompleted-file',payload).then((response)=>{
                        window.open(response.data, "_blank");
                    }).catch((response)=>{
                        Swal.fire({
                            title: "Oops...",
                            text: "A aparut o eroare",
                            confirmButtonText: "Ok"
                        })
                    });
                    return;
                }
                if (!this.acceptDownloading) {
                    Swal.fire({
                        title: "Atentie!",
                        text: `Urmeaza sa descarci un fisier. Doresti sa faci asta? Trebuie sa activezi permisiunea de a deschide pop-ups.`,
                        showDenyButton: true,
                        confirmButtonText: "da",
                        denyButtonText: "nu"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.open(response.data, "_blank");
                            this.acceptDownloading = true;
                        }
                    })
                } else {
                    window.open(response.data, "_blank");
                }
            })
        },

        getCurrentLocation() {
            navigator.geolocation.getCurrentPosition(this.getLocation);
        },

        getLocation(position) {
            this.requestData.latitude = position.coords.latitude;
            this.requestData.longitude = position.coords.longitude;
        },
        selectInstitution(event, institutionName) {
            if (event.target.checked) {
                axios
                    .get(`/get-institution-by-name?i=${institutionName}`)
                    .then((response) => {
                        this.requestData.institution = response.data.id;
                    });
            } else {
                this.requestData.institution = '';
            }
        },

        removeFromArray(array, query) {
            const index = array.indexOf(query);
            if (index > -1) {
                array.splice(index, 1);
            }
        },
        selectDoc(event, doc) {
            if (event.target.checked) {
                this.removeFromArray(this.requestData.necessary, doc);
            } else {
                this.requestData.necessary.push(doc);
            }
        }
    }
}
</script>

<style scoped>

</style>
