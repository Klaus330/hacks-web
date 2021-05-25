<template>
  <div class="row feedback-container-admin" v-if="isGlobalAdmin">
    <a
      class="feedback-admin"
      v-for="(review, index) in reviews"
      :key="index"
      @click="showReview(index)"
    >
      <div class="feedback-name-admin">
        <span>{{ review.username }}</span>
      </div>
      <div class="feedback-info-admin">
        <p class="feedback-text" id="feedback-text">

          {{ review.comment.substring(0, 150) }}...

        </p>
        <p class="feedback-date-admin mr-1" id="feedback-date-admin">
          Rating: {{ review.rating }}
        </p>
      </div>
    </a>
  </div>
  <div class="row feedback-container-admin" v-else>
    <a
      class="feedback-admin"
      v-for="(review, index) in reviews.feedbacks"
      :key="index"
      @click="showReview(index)"
    >
      <div class="feedback-name-admin">
        <span>{{ review.username }}</span>
      </div>
      <div class="feedback-info-admin">
        <p class="feedback-text" id="feedback-text">
          {{ review.comment.substring(0, 150) }}...
        </p>
      </div>
    </a>
  </div>
</template>
<script>
import Swal from "sweetalert2";
export default {
  name: "ReviewsContainer",
  components: { Swal },
  props: ["userType"],
  data() {
    return {
      reviews: [],
    };
  },
  created() {
    if (this.isGlobalAdmin) {
      axios.get("/get-reviews").then((response) => {
        this.reviews = response.data.reviews;
      });
    } else {
      axios
        .get(
          `/get-reviews-by-institution?i=${this.userType.institutions[0].name}`
        )
        .then((response) => {
          this.reviews = response.data;
        });
    }
  },
  methods: {
    showReview(index) {
      if (this.isGlobalAdmin) {
        Swal.fire({
          title: this.reviews[index].username,
          html: `<p>${this.reviews[index].comment}</p>`,
          showDenyButton: true,
          confirmButtonText: "gata",
          denyButtonText: "delete",
        }).then((result) => {
          if (!result.isConfirmed) {
            axios.post("/delete-reviews", { id: this.reviews[index].id }).then((response) => {
              console.log(response);
              this.removeFromArray(this.reviews, index);
            });
          }
        });
      } else {
        Swal.fire({
          title: this.reviews.feedbacks[index].username,
          html: `<strong>${this.reviews.feedbacks[index].process}</strong> <p class="mt-4">${this.reviews.feedbacks[index].comment}</p> `,
          confirmButtonText: "gata",
        });
      }
    },
  
  removeFromArray(array, index) {
                array.splice(index, 1);
        },
  },


  computed: {
    isGlobalAdmin() {
      console.log(this.userType.institutions.length);
      if (this.userType.institutions.length != 0) {
        return false;
      }
      return true;
    },
    reviewsArray() {
      return reviews.filter((review) => {
        return review;
      });
    },
  },
};
</script>
