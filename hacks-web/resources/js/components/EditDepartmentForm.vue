<template>
    <form class="col-8 mt-10 mb-5" v-if="show" @submit.prevent="updateData">
        <div class="form-group col-12 p-0">
            <label for="title">Nume departament:</label>
            <textarea id="title" class="form-control" type="text" name="department" placeholder="Department"
                      v-model="departmentName"></textarea>
        </div>

        <div class="form-group" v-if="canDisplay(this.departmentData.program)">
            <label for="program">Program</label>
            <select @change="selectProgram($event)" name="program" id="program" class="form-control mb-2" style="border: 1px solid black !important;">
                <option v-for="(item,index) in program" :key="index" :value="index">
                    {{ index }}
                </option>
            </select>
            <div v-if="selectedProgramId">
                <label>
                    Ora de deschidere:
                </label>
                <input class="form-control" type="text" v-model="program[selectedProgramId].open">
            </div>
            <div v-if="selectedProgramId">
                <label>
                    Ora de închidere:
                </label>
                <input class="form-control" type="text" v-model="program[selectedProgramId].close">
            </div>
        </div>


        <div class="col-12 mt-3 p-0">
            <button type="submit" class="btn btn-primary">Modifică!</button>
        </div>
    </form>
</template>

<script>
import Swal from 'sweetalert2';

export default {
    name: "EditDepartmentForm",
    components: {Swal},
    props: ['show', 'firstOption', 'secondOption'],
    data() {
        return {
            departmentData: [],
            selectedInfoId: 0,
            selectedFormId: 0,
            selectedProgramId:false,
            program: "{}",
            departmentName: "",
        };
    },
    watch: {
        secondOption: function () {
            this.fetchData();
        }
    },
    methods: {
        fetchData() {
            let url = `/get-department-by-institution?i=${this.firstOption}&d=${this.secondOption}`;
            axios.get(url).then((response) => {
                console.log(response);
                this.departmentData = response.data;
                this.praseData();

            });
        },

        getProgram(index) {
            return this.departmentData.program[index] === undefined ? this.departmentData.program.push([]) : this.departmentData.program[index];
        },

        praseData() {

            this.departmentName = this.departmentData.titlu;
            this.program =this.departmentData.program;
            this.selectedPRogramId =  Object.keys(this.program)[0];
        },

        canDisplay(field) {
            return (field !== "" && this.field !== JSON.stringify({}));
        },

        selectProgram(event)
        {
            this.selectedProgramId=event.target.selectedOptions[0].value;
            console.log(this.program[this.selectedProgramId]);
        },
        updateData() {

            this.departmentData.program = JSON.stringify(this.program);
            this.departmentData.titlu = this.departmentName;

            Swal.fire({
                title: "Esti sigur ca vrei sa modifici?",
                showDenyButton: true,
                confirmButtonText: "da",
                denyButtonText: "nu"
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log(this.departmentData);
                    axios.post("/updateprograms",{institution:this.firstOption, dept: this.departmentData})
                        .then((response) => {
                            console.log(response);
                            Swal.fire({
                                title: "Departamentul a fost modificat",
                                confirmButtonText: "Ok"
                            }).then(() => {
                                window.location = "/admin/departments";
                            })
                        }).catch((response) => {
                        console.log(response);
                        Swal.fire({
                            title: "Oops...",
                            text: response.data.message,
                            confirmButtonText: "Ok"
                        })
                    });
                }
            });

        }
    }


}
</script>

<style scoped>

</style>
