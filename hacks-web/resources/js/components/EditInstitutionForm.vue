<template>
    <form class="col-8 mt-10 mb-5" v-if="show" @submit.prevent="updateData">
        <div class="form-group col-12 p-0">
            <label for="title">Institution Name:</label>
            <textarea id="title" class="form-control" type="text" name="institution" placeholder="Institution"
                      v-model="institutionName"></textarea>

        </div>

        <div class="form-group col-12 p-0">
            <label for="address">Address:</label>
            <textarea id="address" class="form-control" type="text" name="address" placeholder="Address"
                      v-model="address"></textarea>
        </div>

        <div class="form-group col-12 p-0">
            <label for="phone">Phone:</label>
            <textarea id="phone" class="form-control" type="text" name="phone" placeholder="Phone"
                      v-model="phone"></textarea>
        </div>

        <div class="form-group col-12 p-0">
            <label for="email">Email:</label>
            <textarea id="email" class="form-control" type="email" name="email" placeholder="Email"
                      v-model="email"></textarea>
        </div>

        <div class="form-group col-12 p-0">
            <label for="site">Site:</label>
            <textarea id="site" class="form-control" type="text" name="site" placeholder="Site"
                      v-model="site"></textarea>
        </div>

        <div class="col-12 mt-3 p-0">
            <button type="submit" class="btn btn-primary">Modifica!</button>
        </div>
    </form>
</template>

<script>
import Swal from 'sweetalert2';

export default {
    name: "EditInstitutionForm",
    components: {Swal},
    props: ['show', 'firstOption'],
    data() {
        return {
            institutionData: [],
            institutionName: "",
            address: "",
            site: "",
            email: "",
            phone: ""
        };
    },
    watch: {
        firstOption: function () {
            this.fetchData();
        }
    },
    methods: {
        fetchData() {
            let url = `/get-institution-by-name?i=${this.firstOption}`;
            axios.get(url).then((response) => {
                console.log(response);
                this.institutionData = response.data;
                this.praseData();
            }).catch((response) => {
                console.log(response);
            });
        },

        praseData() {
            this.institutionName = this.institutionData.name;
            this.site = this.institutionData.url;
            this.address = this.institutionData.address;
            this.email = this.institutionData.email;
            this.phone = this.institutionData.phone;
        },

        canDisplay(field) {
            return (field !== undefined && field !== "" && field.length > 0);
        },
        updateData() {
            this.institutionData.name = this.institutionName;
            this.institutionData.address = this.address;
            this.institutionData.url = this.site;
            this.institutionData.email = this.email;
            this.institutionData.phone = this.phone;

            Swal.fire({
                title: "Esti sigur ca vrei sa modifici?",
                showDenyButton: true,
                confirmButtonText: "da",
                denyButtonText: "nu"
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post("/update-institution-data", this.institutionData)
                        .then(() => {
                            Swal.fire({
                                title: "Datele despre institutie au fost modificate",
                                confirmButtonText: "Ok"
                            }).then(() => {
                                window.location = "/admin/institutions";
                            })
                        }).catch((response) => {
                        Swal.fire({
                            title: "Oops...",
                            text: response.data.message,
                            confirmButtonText: "Ok"
                        })
                        console.log(response);
                    });
                }
            });

        }
    }


}
</script>

<style scoped>

</style>
