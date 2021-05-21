<template>
  <div>
    <div class="container">
      <section
        class="row docs-section flex justify-content-center align-items-center"
        style="min-height: 100vh"
      >
        <div class="col-12">
          <autocomplete-search
            url="/get-institutions"
            filterby="name"
            v-on:optionSelected="showDetails"
            placeholder="Ce instituție te interesează?"
          ></autocomplete-search>
        </div>
      </section>
    </div>
    <div class="container mt-10" v-if="hasOption">
      <div class="row">
        <div class="col-12 col-md-7">
          <div class="col-12 col-md-8 mt-5 mb-3 align-items-start">
            <h2 class="text-left text-color-blue">{{institutionsName}}</h2>
          </div>

          <div
            class="align-items-start flex-column col-12 col-md-8 text-color-black pl-2rem"
          >
            <div class="row mb-2">
              <img class="mr-2" src="/images/svg/location.svg" />
              <h5>{{address}}</h5>
            </div>
            <div class="row mb-2">
              <img class="mr-2" src="/images/svg/phone.svg" />
              <h5><a :href="`tel:${phone}`">{{phone}}</a></h5>
            </div>
            <div class="row mb-2">
              <img class="mr-2" src="/images/svg/email.svg" />
              <h5><a :href="`mailto:${email}`">{{email}}</a></h5>
            </div>
            <div class="row mb-2">
              <img class="mr-2" src="/images/svg/site.svg" />
              <h5 style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" :title="institutionsName"><a :href="site">{{institutionsName}}</a></h5>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-12 col-md-10">
              <div class="docs-info-container">
                <dep-schedule :data="departments"> </dep-schedule>
              </div>
            </div>
          </div>
        </div>

        <div
          class="col-12 col-md-4 sm-hidden d-flex align-items-center justify-content-center"
        >
          <img style="width: 80%" src="/images/svg/institution.svg" />
        </div>
      </div>
    </div>

    <div class="container-fluid container-fluid-background mt-5" v-if="hasOption">
      <div class="p-5">
        <div class="align-feedback">
          <h2>Feedback-ul tău contează !</h2>
          <a href="/contact" class="btn button-accent-secondary"
            >Oferă feedback</a
          >
        </div>
      </div>
    </div>

    <div class="container" v-if="hasOption">
      <div class="row">
        <div class="flex align-items-center col-12 col-md-12 mt-5">
          <h2 class="text-center text-color-blue mb-3">
            Procese birocratice desfășurate la această instituție
          </h2>
        </div>

        <div class="flex col-12 col-md-12">
          <div class="container form-docs">
            <ul style="max-height: 800px; overflow-y: scroll;">
              <li v-for="(proces,index) in processes" :key="index"><a :href="`/documents?q=${proces.name}`"> {{proces.name}} </a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "InstitutionsPage",
  data() {
    return {
      institutionsName: "",
      institutionsData: [],
      hasOption: false,
      address: "",
      site: "",
      email: "",
      phone: "",
      departmentId: 0,
      departments: [],
      processes: []
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
          this.parseData();
        });
      axios.get(`/get-docs?q=${this.institutionsName}`).then((response)=>{
        this.processes = response.data;

      })
    },
    parseData() {
      this.site = this.institutionsData.url;
      this.address = this.institutionsData.address;
      this.departments = this.institutionsData.departments;
      this.email = this.institutionsData.email;
      this.phone = this.institutionsData.phone;
    },
  },
};
</script>
