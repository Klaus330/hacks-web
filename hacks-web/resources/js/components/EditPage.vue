<template>
    <div class="col-12 d-flex flex-column align-items-center justify-content-center">
<!--        <div class="col-8">-->
<!--            <label>{{firstLabel}}:</label>-->
<!--            <select-form :route='firstUrl' v-model="firstOption" v-on:optionSelected="setFirstOption"></select-form>-->
<!--        </div>-->

<!--        <div class="col-8 mt-4">-->

<!--            <select-form :route='secondUrl' v-model="secondOption" v-on:optionSelected="setSecondOption"></select-form>-->
<!--        </div>-->
        <div class="col-8 mb-5" style="max-height: 90px;">
            <label>{{firstLabel}}:</label>
            <autocomplete :url="firstUrl" :placeholder="firstPlaceholder" v-on:optionSelected="setFirstOption"></autocomplete>
        </div>
        <div class="col-8 mt-5" style="max-height: 90px;">
            <label>{{secondLabel}}:</label>
            <autocomplete :url="secondUrl" :placeholder="secondPlaceholder" v-on:optionSelected="setSecondOption"></autocomplete>
        </div>
        <edit-form :show="showForm" :first-option="firstOption" :second-option="secondOption"></edit-form>
    </div>
</template>

<script>
import SelectForm from "./SelectForm";
import EditForm from "./EditForm";
import Autocomplete from "./Autocomplete";
export default {
    name: "EditPage",
    components: {SelectForm, EditForm, Autocomplete},
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
        getUrl(){
            if(this.firstOption !== '' && this.secondOption !== ''){
                return generateUrl();
            }
            return '';
        }

    },
    methods:{
        setFirstOption(option){
            this.firstOption = option;
        },
        setSecondOption(option){
            this.secondOption = option;
        },
        generateUrl(){
            return
        }
    }
}
</script>

<style scoped>

</style>
