<template>
<div>
  <header class="header-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3">
					<div class="site-logo">
						<img src="https://res.cloudinary.com/dekj6ujzr/image/upload/v1574138332/LaravelElearningImages/background/bf4c6254-efb6-43c5-9cf1-168caf7424d4_200x200.png" alt="">
					</div>
					<div class="nav-switch">
						<i class="fa fa-bars"></i>
					</div>
				</div>
				<div class="col-lg-10 col-md-10">
					<a href="" class="site-btn header-btn">Login</a>
					<a href="" class="site-btn header-btn">Logout</a>
					<nav class="main-menu">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="#">About us</a></li>
							<li><a href="courses">Courses</a></li>
							<li><a href="blog.html">News</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>
<!-- Page info -->
	<div class="page-info-section set-bg" 
  style="background-image: url('https://res.cloudinary.com/dekj6ujzr/image/upload/v1574136740/LaravelElearningImages/background/1.jpg')" >
		<!--<div class="container">
			<div class="site-breadcrumb">
				<a href="#">Home</a>
				<span>Courses</span>
			</div>
		</div>-->
	</div>
	<!-- Page info end -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      value: "test"
    };
  },
  components: {},
  methods: {
    test() {
      // do st
    }
  },
  props: {
    propName: {
      type: Number,
      default: 10
    }
  }
};
</script>

<style lang="scss" scoped>
</style>