<template>
    <div class="col-12 d-flex flex-column align-items-center justify-content-center">
        <div class="col-8 mb-5" style="max-height: 90px;">
            <label>{{ firstLabel }}:</label>
            <autocomplete :url="firstUrl" :placeholder="firstPlaceholder"
                          v-on:optionSelected="setFirstOption"></autocomplete>
        </div>
        <edit-institution-form :show="showForm" :first-option="firstOption" ></edit-institution-form>
    </div>
</template>

<script>
import SelectForm from "./SelectForm";
import EditInstitutionForm from "./EditInstitutionForm";
import Autocomplete from "./Autocomplete";

export default {
    name: "EditPage",

    components: {SelectForm, EditInstitutionForm, Autocomplete},
    props:['firstLabel', 'firstUrl', "firstPlaceholder"],
    data() {
        return {
            firstOption: ''
        };
    },
    computed: {
        showForm() {
            if (this.firstOption !== '') {
                return true;
            }
            return false;
        },
        // createSecondUrl() {
        //     if (this.firstOption !== '') {
        //         return `${this.secondUrl}?q=${this.firstOption}`;
        //     }
        //     return this.secondUrl;
        // }

    },
    methods: {
        setFirstOption(option) {
            this.firstOption = option;
        }
    }
}
</script>

<style scoped>

</style>
