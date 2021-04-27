<template>
    <div class="col-12 d-flex flex-column align-items-center justify-content-center">
        <div class="col-8 mb-5" style="max-height: 90px;">
            <label>{{ firstLabel }}:</label>
            <autocomplete :url="firstUrl" :placeholder="firstPlaceholder"
                          v-on:optionSelected="setFirstOption"></autocomplete>
        </div>
        <div class="col-8 mt-5" style="max-height: 90px;">
            <label>{{ secondLabel }}:</label>
            <autocomplete :url="createSecondUrl" :placeholder="secondPlaceholder"
                          v-on:optionSelected="setSecondOption"></autocomplete>
        </div>
        <edit-process-form :show="showForm" :first-option="firstOption" :second-option="secondOption"></edit-process-form>
    </div>
</template>

<script>
import SelectForm from "./SelectForm";
import EditProcessForm from "./EditProcessForm";
import Autocomplete from "./Autocomplete";

export default {
    name: "EditPage",

    components: {SelectForm, EditProcessForm, Autocomplete},
    props:['firstLabel', 'secondLabel', 'firstUrl', 'secondUrl', "firstPlaceholder","secondPlaceholder"],
    data() {
        return {
            firstOption: '',
            secondOption: ''
        };
    },
    computed: {
        showForm() {
            if (this.secondOption !== '' && this.firstOption !== '') {
                return true;
            }
            return false
        },
        createSecondUrl() {
            if (this.firstOption !== '') {
                return `${this.secondUrl}?q=${this.firstOption}`;
            }
            return this.secondUrl;
        }

    },
    methods: {
        setFirstOption(option) {
            this.firstOption = option;
        },
        setSecondOption(option) {
            this.secondOption = option;
        }
    }
}
</script>

<style scoped>

</style>
