<template>
    <div class="col-12 d-flex flex-column align-items-center justify-content-center">
        <div class="col-8">
            <label>{{firstLabel}}:</label>
            <select-form :route='firstUrl' v-model="firstOption"></select-form>
        </div>

        <div class="col-8 mt-4">
            <label>{{secondLabel}}:</label>
            <select-form :route='secondUrl' v-model="secondOption"></select-form>
        </div>

        <edit-form :show="showForm" :first-option="firstOption" :second-option="secondOption"></edit-form>
    </div>
</template>

<script>
import SelectForm from "./SelectForm";
import EditForm from "./EditForm";

export default {
    name: "EditPage",
    components: [SelectForm, EditForm],
    props:['firstLabel', 'secondLabel', 'firstUrl', 'secondUrl'],
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
        }
    }
}
</script>

<style scoped>

</style>
