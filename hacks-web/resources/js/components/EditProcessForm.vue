<template>
    <form class="col-8 mt-10 mb-5" v-if="show" @submit.prevent="updateData">
        <div class="form-group col-12 p-0">
            <label for="title">Numele procesului:</label>
            <textarea id="title" class="form-control" type="text" name="process" placeholder="Proces"
                      v-model="processName"></textarea>

        </div>

        <div class="form-group">
            <label for="cases">Cazuri</label>
            <select name="cases" id="cases" class="form-control mb-2 caz-docs" style="border: 1px solid black !important;">
                <option v-for="(item,index) in cases" :key="item" :value="index" @click="selectedCaseId=index">
                    {{ item.substring(0,50) }}...
                </option>
            </select>
            <textarea type="text" class="form-control" v-model="cases[selectedCaseId]"></textarea>
        </div>

        <div class="form-group" v-if="canDisplay(generalInfo,selectedCaseId)">
            <label for="info">Informații generale</label>
            <select name="info" id="info" class="form-control mb-2 caz-docs" style="border: 1px solid black !important;" >
                <option v-for="(item,index) in getGeneralInfo(selectedCaseId)" :key="index" :value="index"
                        @click="selectedInfoId=index">{{ item.substring(0,50) }}...
                </option>
            </select>
            <textarea type="text" class="form-control" v-model="generalInfo[selectedCaseId][selectedInfoId]"></textarea>
        </div>


        <div class="form-group" v-if="canDisplay(forms,selectedCaseId)">
            <label for="forms">Formulare</label>
            <select name="forms" id="forms" class="form-control mb-2 caz-docs" style="border: 1px solid black !important;">
                <option v-for="(item,index) in getForms(selectedCaseId)" :key="index" :value="index"
                        @click="selectedFormId=index">{{ item.substring(0,50) }}...
                </option>
            </select>
            <textarea type="text" class="form-control" v-model="forms[selectedCaseId][selectedFormId]"></textarea>
        </div>


        <div class="form-group" v-if="canDisplay(prices,selectedCaseId)">
            <label for="prices">Prețuri</label>
            <select name="prices" id="prices" class="form-control mb-2 caz-docs" style="border: 1px solid black !important;">
                <option v-for="(item,index) in getPrices(selectedCaseId)" :key="index" :value="index"
                        @click="selectedPriceId=index">{{ item.substring(0,50) }}...
                </option>
            </select>
            <textarea type="text" class="form-control" v-model="prices[selectedCaseId][selectedPriceId]"></textarea>
        </div>

        <div class="form-group" v-if="canDisplay(necessary, selectedCaseId)">
            <label for="necessary caz-docs">Necesare</label>
            <select name="necessary" id="necessary" class="form-control mb-2 caz-docs"
                    style="border: 1px solid black !important;">
                <option v-for="(item,index) in getNecessary(selectedCaseId)"
                        :key="index" :value="index"
                        @click="selectedNecessaryId=index">{{ item.substring(0,50) }}...
                </option>
            </select>
            <textarea type="text" class="form-control"
                      v-model="necessary[selectedCaseId][selectedNecessaryId]"></textarea>
        </div>

        <div class="col-12 mt-3 p-0">
            <button type="submit" class="btn btn-primary">Modifică!</button>
        </div>
    </form>
</template>

<script>
import Swal from 'sweetalert2';

export default {
    name: "EditForm",
    components: {Swal},
    props: ['show', 'firstOption', 'secondOption'],
    data() {
        return {
            processData: [],
            selectedCaseId: 0,
            selectedInfoId: 0,
            selectedFormId: 0,
            selectedPriceId: 0,
            selectedNecessaryId: 0,
            cases: "",
            prices: "",
            forms: "",
            generalInfo: "",
            necessary: "",
            processName: "",
        };
    },
    watch: {
        secondOption: function () {
            this.fetchData();
        }
    },
    methods: {
        fetchData() {
            let url = `/get-process-by-institution?i=${this.firstOption}&p=${this.secondOption}`;
            axios.get(url).then((response) => {
                this.processData = response.data;
                this.praseData();
            });
        },

        getPrices(index) {
            return this.processData.prices[index] === undefined ? this.processData.prices.push([]) : this.processData.prices[index];
        },

        getGeneralInfo(index) {
            return this.processData.generalInfo[index] === undefined ? this.processData.generalInfo.push([]) : this.processData.generalInfo[index];
        },

        getForms(index) {
            return this.processData.forms[index] === undefined ? this.processData.forms.push([]) : this.processData.forms[index];
        },

        getNecessary(index) {
            return this.processData.necessary[index] === undefined ? this.processData.necessary.push([]) : this.processData.necessary[index];
        },

        praseData() {
            this.processName = this.processData.process;
            this.cases = this.processData.cases;
            this.generalInfo = this.processData.generalInfo;
            this.forms = this.processData.forms;
            this.prices = this.processData.prices;
            this.necessary = this.processData.necessary;


            for (let i = 0; i < this.necessary.length; i++) {
                this.necessary[i] = this.necessary[i].map((array) => {
                    return array.join('\n');
                })
            }
        },

        canDisplay(field) {
            return (field !== "");
        },
        updateData() {
            if (Array.isArray(this.necessary)) {
                for (let i = 0; i < this.necessary.length; i++) {
                        this.necessary[i]= this.necessary[i].map((array) => {
                            console.log(array);
                            return array.split('\n');
                        })
                }
            }

            this.processData.necessary = this.necessary;
            this.processData.prices = this.prices;
            this.processData.forms = this.forms;
            this.processData.generalInfo = this.generalInfo;
            this.processData.cases = this.cases;
            this.processData.process = this.processName;

            Swal.fire({
                title: "Esti sigur ca vrei sa modifici?",
                showDenyButton: true,
                confirmButtonText: "da",
                denyButtonText: "nu"
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post("/update-process-data", this.processData)
                        .then(() => {
                            Swal.fire({
                                title: "Procesul a fost modificat",
                                confirmButtonText: "Ok"
                            }).then(() => {
                                window.location = "/admin/documents";
                            })
                        }).catch((response) => {
                        Swal.fire({
                            title: "Oops...",
                            text: response.data.message,
                            confirmButtonText: "Ok"
                        })
                    });
                }
                else
                {
                    for (let i = 0; i < this.necessary.length; i++) {
                        this.necessary[i] = this.necessary[i].map((array) => {
                            return array.join('\n');
                        })
                    }
                }
            });

        }
    }


}
</script>

<style scoped>

</style>
