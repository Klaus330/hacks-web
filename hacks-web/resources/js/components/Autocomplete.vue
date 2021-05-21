<template>
    <div>
        <div class="autocomplete position-relative">
            <input type="text" v-model="query" :placeholder="placeholder"
                   class="form-control search-docs input" @focusin="toggleVisibility=true">
            <div class="options" v-show="toggleVisibility">
                <ul class="options-list">
                    <li v-show="noItems" class="options-list-item" disabled>Niciun proces găsit</li>
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
    props: ['url', 'filterby', 'placeholder', 'options'],
    data() {
        return {
            items: [],
            query: '',
            toggleVisibility: false
        }
    },
    mounted() {
        this.getData();
        this.checkIfHasQueryParams();
    },
    watch:{
        url:function () {
            this.getData();
        }
    },
    computed: {
        matches() {
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
        },
         checkIfHasQueryParams(){
            let params = new URLSearchParams(window.location.search);
            let query = params.get('q');
            if(query !== null && query !== undefined && query!==""){
                this.query=query;
                this.$emit("optionSelected", query);
            }
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
