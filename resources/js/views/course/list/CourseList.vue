<template>
  <div>
	<CourseSearch></CourseSearch>
	<!-- course section -->
	<section class="course-section spad pb-0">
		<div class="course-warp">
			<ul class="course-filter controls">
				<li class="control active" data-filter="all">All</li>
				<li class="control" data-filter=".finance">Finance</li>
				<li class="control" data-filter=".design">Design</li>
				<li class="control" data-filter=".web">Web Development</li>
				<li class="control" data-filter=".photo">Photography</li>
			</ul>                                       
			<div class="row course-items-area">
				<!-- course -->
				<CourseCard></CourseCard>
				<!-- course -->
				<CourseCard></CourseCard>
				<!-- course -->
				<CourseCard></CourseCard>
				<!-- course -->
				<CourseCard></CourseCard>
				<!-- course -->
				<CourseCard></CourseCard>
				<!-- course -->
				<CourseCard></CourseCard>
				<!-- course -->
				<CourseCard></CourseCard>
				<!-- course -->
				<CourseCard></CourseCard>
      </div>
			<div class="featured-courses">
				<div class="featured-course course-item">
					<div class="course-thumb set-bg" data-setbg="img/courses/f-1.jpg">
						<div class="price">Price: $15</div>
					</div>
					<div class="row">
						<div class="col-lg-6 offset-lg-6 pl-0">
							<div class="course-info">
								<div class="course-text">
									<div class="fet-note">Featured Course</div>
									<h5>HTNL5 & CSS For Begginers</h5>
									<p>Lorem ipsum dolor sit amet, consectetur. Phasellus sollicitudin et nunc eu efficitur. Sed ligula nulla, molestie quis ligula in, eleifend rhoncus ipsum. Donec ultrices, sem vel efficitur molestie, massa nisl posuere ipsum, ut vulputate mauris ligula a metus. Aenean vel congue diam, sed bibendum ipsum. Nunc vulputate aliquet tristique. Integer et pellentesque urna</p>
									<div class="students">120 Students</div>
								</div>
								<div class="course-author">
									<div class="ca-pic set-bg" data-setbg="img/authors/1.jpg"></div>
									<p>William Parker, <span>Developer</span></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="featured-course course-item">
					<div class="course-thumb set-bg" data-setbg="img/courses/f-2.jpg">
						<div class="price">Price: $15</div>
					</div>
					<div class="row">
						<div class="col-lg-6 pr-0">
							<div class="course-info">
								<div class="course-text">
									<div class="fet-note">Featured Course</div>
									<h5>HTNL5 & CSS For Begginers</h5>
									<p>Lorem ipsum dolor sit amet, consectetur. Phasellus sollicitudin et nunc eu efficitur. Sed ligula nulla, molestie quis ligula in, eleifend rhoncus ipsum. Donec ultrices, sem vel efficitur molestie, massa nisl posuere ipsum, ut vulputate mauris ligula a metus. Aenean vel congue diam, sed bibendum ipsum. Nunc vulputate aliquet tristique. Integer et pellentesque urna</p>
									<div class="students">120 Students</div>
								</div>
								<div class="course-author">
									<div class="ca-pic set-bg" data-setbg="img/authors/2.jpg"></div>
									<p>William Parker, <span>Developer</span></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- course section end -->


	<!-- banner section -->
	<section class="banner-section spad">
		<div class="container">
			<div class="section-title mb-0 pb-2">
				<h2>Join Our Community Now!</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
			</div>
			<div class="text-center pt-5">
				<a href="#" class="site-btn">Register Now</a>
			</div>
		</div>
	</section>
	<!-- banner section end -->
  </div>
</template>

<script>
import CourseCard from './CourseCard.vue';
import CourseSearch from './CourseSearch.vue';

export default {
  data() {
    return {
      loading: false,
      courses: {},
      // line1: {},
      // line2: {},
      message: "hello"
    };
  },
  components: {
    'CourseCard' : CourseCard,
    'CourseSearch' : CourseSearch
  },
  methods: {
    compute(courses) {
      // this.line1 = courses.slice(0, 2);
      // this.line2 = courses.slice(2, 4);
    },
    // gọi api để load data vào view
    fetchData(page='1') {
        this.loading = true;
        axios.get('/api/courses' + '?perPage=4&page=' + page).then((response) => {
            // this.loading = !response.data.status;
            this.loading = true;
            this.courses = response.data.data.data;
            this.compute(this.courses);
            this.loading = false; 
        });
    }
  },
  // khi view được mở thì chạy cái mounted
  mounted: function() {
    this.fetchData();
  }
};
</script>

