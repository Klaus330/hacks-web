<template>
    <div>
        <div class="dropdown show mb-4">
            <a
                class="btn btn-secondary dropdown-toggle"
                href="#"
                role="button"
                id="dropdownMenuLink"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
            >
                Departamente
            </a>
            <ol
                class="dropdown-menu docs-dropdown col-12"
                aria-labelledby="dropdownMenuLink"
                style="max-height: 500px; overflow-y: scroll"
            >
                <li
                    v-for="(department, index) in data"
                    :key="index"
                    @click="showProgram(index)"
                    style="cursor: pointer;"
                >
                    {{ department.name }}
                </li>
            </ol>
        </div>
        <div v-if="hasOption">
            <h5 class="mb-2">Program {{selectedDepartment.name}}</h5>

            <ul v-if="canDisplayProgram()">
                <li v-for="(program, index) in selectedDeptProgram" :key="index"><strong>{{index}}</strong> :

                    <span v-for="(hour,index) in splitHours(program.open)">
                        {{ hour}}-{{displayHour(program.close, index)}} 
                    </span>

                </li>
            </ul>

            <p v-else> Nu avem date despre program.</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "DepartmentSchedule",
    props: ["data"],
    data() {
        return {
            selectedDepartment: [],
            hasOption: false,
        };
    },
    watch:{
        data: function(){
            this.hasOption = false;
        }
    },
    computed: {
        selectedDeptProgram() {
            return JSON.parse(this.selectedDepartment.program);
        }
    },
    methods: {
        showProgram(index) {
            this.selectedDepartment = this.data[index];
            this.hasOption = true;
        },
        canDisplayProgram(){
            return this.selectedDepartment.program !== JSON.stringify({});
        },

        displayHour(hours, index){
            let array = hours.split(" ");

            return array[index];
        },

        splitHours(hours){
            return hours.split(" ");
        }
    },
};
</script>

<style scoped>
</style>
