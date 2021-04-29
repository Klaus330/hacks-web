<template>
    <div>
        <div class="container">
            <section class="row docs-section flex justify-content-center align-items-center" style="min-height: 100vh;">
                <div class="col-12">
                    <autocomplete-search url="/get-docs" filterby="name"
                                         v-on:optionSelected="showDetails"
                                         placeholder="Ce proces birocratic te intereseaza?"></autocomplete-search>
                </div>

                <div class="col-12 mt-fix-large case-container" v-show="canDisplay(cases)">
                    <label>
                        Caz:
                    </label>
                    <select class="form-control border">
                        <option v-for="(item,index) in cases" :key="item" :value="index" @click="selectedCaseId=index">
                            {{ item }}
                        </option>
                    </select>
                </div>
            </section>
        </div>
        <div class="container mb-5 mt-fix-medium" v-if="canDisplay(generalInfo[selectedCaseId])">
            <div class="warning-container docs-section-title-warning text-center col-sm-4">
                <img src="/images/svg/alert.svg" />
                <h3>Atenție</h3>
            </div>
            <div class="col-12">
                <ol class="panel ">
                    <li v-for="(info,index) in generalInfo[selectedCaseId]" :key="index" class="panel-item">
                        <p v-for="(line,index) in parseInfo(index)" :key="index">
                            {{ line }}
                        </p>
                    </li>
                </ol>
            </div>
        </div>
        <div class="container-fluid container-fluid-background mb-5 mt-10" v-if="hasOption">
            <div class="p-5">
                <div class="align-feedback">
                    <h2>Feedback-ul tau conteaza !</h2>
                    <a :href="feedbackLink" class="btn button-accent-secondary">Ofera feedback</a>
                </div>
            </div>
        </div>
        <div class="container mt-10">
            <section class="docs-section" v-if="hasOption">
                <div  style="white-space: nowrap;">
                    <h3 class="col-sm-5 docs-section-title text-center" :title=processName style="text-overflow: ellipsis;overflow: hidden;" >{{ processName }}</h3>
                </div>
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="docs-info-container">

                            <div v-if="canDisplay(necessary[selectedCaseId])" class="dropdown show">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                   id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Documente necesare

                                </a>
                                <ol class="dropdown-menu docs-dropdown col-12" aria-labelledby="dropdownMenuLink">

                                    <li v-for="(documents,index) in necessary[selectedCaseId]" :key="index" class="dropdown-item-docs">
                                        <p v-for="(document,index) in documents" :key="index">-{{document}}</p>
                                    </li>

                                </ol>
                            </div>

                            <div v-if="canDisplay(forms[selectedCaseId]) || canDisplay(departaments[selectedCaseId])" class="dropdown show">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                   id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Conditii generale

                                </a>
                                <ol class="dropdown-menu docs-dropdown col-12" aria-labelledby="dropdownMenuLink">

                                    <li v-if="canDisplay(forms[selectedCaseId])" class="dropdown-item-docs">- Formulare
                                        <div>
                                            <p v-for="(form, index) in forms[selectedCaseId]" :key="index">{{form}}</p>
                                        </div>
                                    </li>
                                    <li v-if="canDisplay(departaments[selectedCaseId])" class="dropdown-item-docs">- Departamente
                                        <div>
                                            <p >{{departaments[selectedCaseId]}}</p>
                                        </div>
                                    </li>


                                </ol>
                            </div>
                            <div class="dropdown show">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                   id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Instituția care
                                    eliberează
                                </a>

                                <ol class="dropdown-menu docs-dropdown col-12" aria-labelledby="dropdownMenuLink">

                                    <li class="dropdown-item-docs">{{ processData.institution }}
                                    </li>

                                </ol>
                            </div>

                            <div v-if="canDisplay(prices[selectedCaseId])" class="dropdown show">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                   id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Preturi
                                </a>
                                <ol class="dropdown-menu docs-dropdown col-12" aria-labelledby="dropdownMenuLink">
                                    <li v-for="(priceList,index) in prices[selectedCaseId]" :key="index"
                                        class="dropdown-item-docs">
                                        {{ priceList }}
                                    </li>
                                </ol>
                            </div>

                            <div v-if="canDisplay(files[selectedCaseId])" class="dropdown show">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                   id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Anexe
                                </a>

                                <ol class="dropdown-menu docs-dropdown col-12" aria-labelledby="dropdownMenuLink">

                                    <li v-for="(file,index) in files" :key="index" @click="downloadFile(file)" class="dropdown-item-docs">{{file}}
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

        <div class="container-fluid container-fluid-background my-5" v-if="hasOption">
            <div class="p-5">
                <div class="align-feedback">
                    <h2>Gata de drum?</h2>
                    <a :href="routeLink" class="btn button-accent-secondary">Genereaza traseu</a>
                </div>
            </div>
        </div>
        <div class="container mt-10" v-if="hasOption">
            <div class="row">

                <div class="flex align-items-center col-12 col-md-12 mt-5">
                    <h2 class="text-center text-color-blue mb-3"> Timpul mediu de asteptare</h2>
                </div>
            </div>

            <statistics></statistics>

        </div>
    </div>
</template>

<script>
import Autocomplete from "./Autocomplete";
import Statistics from "./StatisticsChart";

export default {
    name: "ProcessesPage",
    components: {Autocomplete, Statistics},
    data() {
        return {
            hasOption: false,
            processName: '',
            processData: [],
            cases: "",
            prices: "",
            forms: "",
            generalInfo: "",
            necessary: "",
            selectedCaseId: 0,
            selectedInfoId: 0,
            selectedFormId: 0,
            selectedPriceId: 0,
            selectedNecessaryId: 0,
            departaments: "",
            files:""
        }
    },
    computed: {
        routeLink() {
            if (this.processName !== '') {
                return `/route?p=${this.processName}`
            }
        },
        feedbackLink() {
            if (this.processName !== '') {
                return `/feedback?p=${this.processName}`
            }
        }
    },
    methods: {
        parseData() {
            this.cases = this.processData.cases;
            this.generalInfo = this.processData.generalInfo;
            this.forms = this.processData.forms;
            this.prices = this.processData.prices;
            this.necessary = this.processData.necessary;
            this.departaments = this.processData.departaments;
            this.files=this.processData.files;
        },
        canDisplay(field) {
            if(field!==undefined && Array.isArray(field)){
                for(let i=0 ; field.length>i ; ++i){
                    return (field[i]!=="");
                }
            }
            return (field !== "" && field !== undefined && field.length !== 0);
        },
        downloadFile(file){

        },
        parseInfo(index) {
            if (this.generalInfo[this.selectedCaseId] !== undefined) {
                return this.generalInfo[this.selectedCaseId][index].split("\n");
            } else {
                return [];
            }
        },
        showDetails(process) {
            this.processName = process;
            this.hasOption = true;
            axios.get(`/get-process-by-name?p=${this.processName}`)
                .then((response) => {
                    console.log(response);
                    this.processData = response.data;
                    this.parseData();
                })
        }
    }
}
</script>

<style scoped>

</style>
