
<template>  
        <div class="mix col-lg-3 col-md-4 col-sm-6 design">
            <div class="course-item">
                <div class="course-thumb set-bg" data-setbg="img/courses/2.jpg">
                    <div class="price">Price: $15</div>
                </div>
                <div class="course-info">
                    <div class="course-text">
                        <h5>IT Development</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                        <div class="students">120 Students</div>
                    </div>
                    <div class="course-author">
                        <div class="ca-pic set-bg" data-setbg="img/authors/2.jpg"></div>
                        <p>William Parker, <span>Developer</span></p>
                    </div>
                </div>
            </div>
		</div>
</template>

<script>
export default {
    props: {
        data: {
            type: Object
        }
    }
};
</script>

<style></style>
