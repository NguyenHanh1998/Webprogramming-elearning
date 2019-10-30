<template>
  <div v-loading.body="loading">
    <!-- view chính của màn hình courses -->
    <!-- hiển thị trong 2 dòng là các CourseCard-->
    <b-card-group>
      <b-col v-for="(course, index) in line1" :key="index">
      <!-- mỗi một phần này là 1 card -->
        <course-card :data="course"></course-card>
      </b-col>
    </b-card-group>
    <b-card-group>
      <b-col v-for="(course, index) in line2" :key="index">
        <course-card :data="course"></course-card>
      </b-col>
    </b-card-group>
  </div>
</template>

<script>
import CourseCard from './CourseCard.vue';
export default {
  data() {
    return {
      loading: false,
      courses: {},
      line1: {},
      line2: {}
    };
  },
  components: {
    'course-card' : CourseCard
  },
  methods: {
    compute(courses) {
      this.line1 = courses.slice(0, 3);
      this.line2 = courses.slice(3, 6);
    },
    // gọi api để load data vào view
    fetchData(page='1') {
        this.loading = true;
        axios.get('/api/courses' + '?perPage=6&page=' + page).then((response) => {
            this.loading = !response.data.status;
            this.courses = response.data.data.data;
            console.log(response.data.data.data.slice(0,4));
            this.compute(this.courses);
        });
    }
  },
  // khi view được mở thì chạy cái mounted
  mounted: function() {
    this.fetchData();
  }
};
</script>

<style>
</style>