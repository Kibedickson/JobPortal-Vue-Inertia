<template>
    <div>
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>Profile</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-xs-12">
                        <div class="right-sideabr">
                            <h4>Manage Account</h4>
                            <ul class="list-item">
                                <li><a href="">My Resume</a></li>
                                <li><a href="">Manage Applications</a></li>
                            </ul>
                        </div>
                    </div>
                    <div v-for="resume in resumes" class="col-lg-8 col-md-8 col-xs-12">
                        <div class="inner-box my-resume">
                            <div class="author-resume">
                                <div class="thumb">
                                    <img src="assets/img/testimonial/img2.png" alt="">
                                </div>
                                <div class="btn float-right">
                                    <inertia-link :href="route('profiles.edit', resume.id)">Edit</inertia-link>
                                </div>
                                <div class="author-info">
                                    <h3>{{ $page.auth.user.name }}</h3>
                                    <p>{{ resume.age }} years</p>
                                </div>
                            </div>
                            <div class="education item">
                                <h4>{{ resume.title }}</h4>
                                <p>Skills: {{ resume.skill }}</p>
                                <p>Location: <span class="address"><i class="lni-map-marker"></i>{{ resume.location }} </span> </p>
                            </div>
                            <div class="education item">
                                <h3>Education</h3>
                                <h4>{{ resume.school }}</h4>
                                <p>{{ resume.degree }} of {{ resume.field }}</p>
                                <span class="date">{{ resume.year }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import App from "../../App";
export default {
    layout: App,
    props: {
        resumes: Array,
    }
}
</script>

<style scoped>

</style>
