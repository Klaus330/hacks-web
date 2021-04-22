<template>
    <div class="dashboard-select">
        <select class="form-select round">
            <option value="" disabled selected>None</option>
            <option :value="item.name" v-for="item in data" :key="item.name" @click="selected(item.name)">{{ item.name }}</option>
        </select>
    </div>
</template>

<script>
export default {
    name: "SelectForm",
    props: ['route'],
    data() {
        return {
            data: {}
        };
    },
    mounted() {
        axios.get(this.route)
            .then(response => {
                this.data = response.data;

            })
        .catch((error)=>{
            console.log(error);
        });
    },
    methods:{
        selected(item){
            this.$emit('optionSelected', item);
        }
    }
}
</script>

<style scoped>

</style>
