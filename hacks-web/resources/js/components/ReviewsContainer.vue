<template>
  <div class="row feedback-container-admin">
    <a class="feedback-admin" v-for="(review,index) in reviews" :key="index" @click="showReview(index)">
      <div class="feedback-name-admin"><span>{{ review.username }}</span></div>
      <div class="feedback-info-admin">
        <p class="feedback-text" id="feedback-text">
          {{ review.comment.substring(1,150) }}...
        </p>
        <p class="feedback-date-admin mr-1" id="feedback-date-admin">
          Rating: {{ review.rating }}
        </p>
      </div>
    </a>
  </div>
</template>
<script>
import Swal from 'sweetalert2';
export default {
  name: "ReviewsContainer",
  components: {Swal},
  data() {
    return {
      reviews: [],
    };
  },
  created() {
    axios.get("/get-reviews").then((response) => {
      this.reviews = response.data.reviews;
     
    });
  },
  methods:{
      showReview(index){
          Swal.fire({
              title:this.reviews[index].username,
              html:`<p>${this.reviews[index].comment}</p>`,
              confirmButtonText:"gata",
              button: "delete"
          })
      }
  }
};
</script>
