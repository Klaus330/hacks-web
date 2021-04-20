<template>
    <div>

        <div class="autocomplete">
            <input type="text" v-model="query" placeholder="Ce proces birocratic te intereseaza?"
                   class="form-control search-docs" @focusin="toggleVisibility=true">
            <div class="options" v-if="toggleVisibility">
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
    props: ['url', 'filterby'],
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
    computed: {
        matches() {
            if (this.query === '') {
                return this.items;
            }
            return this.items.filter((item) => item.name.search(new RegExp(this.query, "i")) === 0);
        },
        noItems() {
            return (this.matches.length === 0);
        }
    },
    methods: {
        getData() {
            axios.get(this.url)
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

</style>
