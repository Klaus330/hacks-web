<template>
    <div>
        <div class="autocomplete position-relative">
            <input type="text" v-model="query" :placeholder="placeholder"
                   class="form-control search-docs input" @focusin="toggleVisibility=true">
            <div class="options" v-show="toggleVisibility">
                <ul class="options-list">
                    <li v-show="noItems" class="options-list-item" disabled>Niciun proces gasit</li>
                    <li :key="item.name" v-for="item in matches" @click="selected(item.name)" class="options-list-item">
                        {{ item.name }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Autocomplete",
    props: ['url', 'filterby', 'placeholder', 'options', "institution"],
    data() {
        return {
            items: [],
            query: '',
            toggleVisibility: false
        }
    },
    mounted() {
        this.getData();
    },
    watch:{
        url:function () {
            this.getData();
        }
    },
    computed: {
        matches() {
            if(this.institution !== undefined && this.institution.length>0){
                this.query = this.institution[0].name;
                this.$emit("optionSelected", this.query);
            }
            if (this.query === '') {
                return this.items;
            }
            let word = ".*"+this.query+".*";
            return this.items.filter((item) => item.name.search(new RegExp(word, "i")) === 0);
        },
        noItems() {
            return (this.matches.length === 0);
        }
    },
    methods: {
        getData() {
            axios.get(this.url, this.options)
                .then(response => {
                    this.items = response.data;
                })
                .catch();
        },
        selected(process) {
            this.query = process;
            this.toggleVisibility = false;
            this.$emit("optionSelected", process);
        }
    }
}
</script>

<style scoped>
.input{
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    padding: 0;
    padding-right: 0px;
    padding-left: 0px;
    padding-right: 60px;
    padding-left: 10px;
}

</style>
