<template>
  <div class="container">
    <section class="row flex justify-content-center" style="min-height: 40vh">
      <form
        class="row docs-section"
        action="/invite-admin"
        method="POST"
        @submit.prevent="submitForm"
      >
        <div class="col-12">
          <div class="autocomplete position-relative">
            <input
              type="email"
              placeholder="Adresa de email a noului administrator"
              class="form-control complet-docs input"
              v-model="email"
            />
          </div>
        </div>

        <div class="col-12">
          <autocomplete-search
            url="/get-institutions"
            filterby="name"
            v-on:optionSelected="showDetails"
            placeholder="Alege institutitia pentru administrator"
          ></autocomplete-search>
        </div>

         <div style="margin-left: auto; margin-right: auto;">
            <button type="submit" class="btn btn-primary">Adauga admin!</button>
        </div>
      </form>
    </section>
  </div>
</template>
<script>
import Swal from "sweetalert2";
export default {
  name: "InviteAdminInstitutions",
  data() {
    return {
      institutionsName: "",
      institutionsData: [],
      hasOption: false,
      email: "",
      terms: false,
    };
  },
  methods: {
    showDetails(name) {
      this.institutionsName = name;
      this.hasOption = true;
      axios
        .get(`/get-institution-by-name?i=${this.institutionsName}`)
        .then((response) => {
          this.institutionsData = response.data;
         
        });
    },

    submitForm() {
      Swal.fire({
        title: "Esti sigur ca doresti sa il adaugi?",
        showDenyButton: true,
        confirmButtonText: "da",
        denyButtonText: "nu",
      }).then((result) => {
        if (result.isConfirmed) {
          axios
            .post("/invite-admin", {
              email: this.email,
              institution: this.institutionsData.id,
            })
            .then((response) => {
              console.log(response);
              Swal.fire({
                title: "Admin adaugat",
                confirmButtonText: "Ok",
              }).then(() => {
                window.location = "/admin/invite";
              });
            })
            .catch(({response}) => {
                
              console.log(response.data);
              Swal.fire({
                title: "Oops...",
                text: response.data.error.message,
                confirmButtonText: "Ok",
              });
            });
        }
      });
    },
  },
};
</script>
