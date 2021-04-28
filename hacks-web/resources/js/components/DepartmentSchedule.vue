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
      >
        <li
          v-for="(department, index) in data"
          :key="index"
          @click="showProgram(index)"
        >
          {{ department.name }}
        </li>
      </ol>
    </div>
    <div v-if="hasOption">
      <h5>Program</h5>
      <ul>
        <li>Liber</li>
      </ul>
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
  methods: {
    showProgram(index) {
      this.selectedDepartment = this.data[index];
      this.hasOption = true;
    },
  },
};
</script>

<style scoped>
</style>
