<template>
    <div class="dashboard-select">
        <select class="form-select round">
            <option value="" disabled selected>None</option>
            <option :value="item.name" v-for="item in data" :key="item.name">{{ item.name }}</option>
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
                console.log(response);
                this.data = response.data;
            })
        .catch();
    }
}
</script>

<style scoped>

</style>
