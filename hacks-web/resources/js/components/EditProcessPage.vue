<template>
    <div class="col-12 d-flex flex-column align-items-center justify-content-center">
        <div class="col-8 mb-5" style="max-height: 90px;">
            <label>{{firstLabel}}:</label>
            <autocomplete :url="firstUrl" :placeholder="firstPlaceholder" :institution="institution" v-on:optionSelected="setFirstOption"></autocomplete>
        </div>
        <div class="col-8 mt-5" style="max-height: 90px;">
            <label>{{secondLabel}}:</label>
            <autocomplete :url="createSecondUrl" :placeholder="secondPlaceholder" v-on:optionSelected="setSecondOption"></autocomplete>
        </div>
        <edit-process-form :show="showForm" :first-option="firstOption" :second-option="secondOption"></edit-process-form>
    </div>
</template>

<script>
import SelectForm from "./SelectForm";
import EditProcessForm from "./EditProcessForm";
import Autocomplete from "./Autocomplete";
export default {
    name: "EditProcessPage",
    components: {SelectForm, EditProcessForm, Autocomplete},
    props:['firstLabel', 'secondLabel', 'firstUrl', 'secondUrl', "firstPlaceholder","secondPlaceholder","institutionAdmin"],
    data() {
        return {
            firstOption: '',
            secondOption: '',
            institution: this.institutionAdmin
        };
    },
    computed: {
        showForm() {
            return this.secondOption !== '' && this.firstOption !== '';

        },
        getUrl(){
            if(this.firstOption !== '' && this.secondOption !== ''){
                return generateUrl();
            }
            return '';
        },
        createSecondUrl() {
            if (this.firstOption !== '') {
                return `${this.secondUrl}?q=${this.firstOption}`;
            }
            return this.secondUrl;
        }

    },
    methods:{
        setFirstOption(option){
            if(this.institution!==undefined && this.institution.length>0){
                this.firstOption = this.institution[0].name;
            }
            this.firstOption = option;
        },
        setSecondOption(option){
            this.secondOption = option;
        }
    }
}
</script>

<style scoped>

</style>
