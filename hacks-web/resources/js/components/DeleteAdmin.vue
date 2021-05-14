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
              placeholder="Sterge adresa de email a administratorului"
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
            <button type="submit" class="btn btn-primary">Sterge admin!</button>
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
        title: "Esti sigur ca doresti sa il stergi?",
        showDenyButton: true,
        confirmButtonText: "da",
        denyButtonText: "nu",
      }).then((result) => {
        if (result.isConfirmed) {
          axios
            .post("/delete-admin", {
              email: this.email,
              institution: this.institutionsData.id,
            })
            .then((response) => {
              console.log(response);
              Swal.fire({
                title: "Admin sters",
                confirmButtonText: "Ok",
              }).then(() => {
                window.location = "/admin/delete";
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
