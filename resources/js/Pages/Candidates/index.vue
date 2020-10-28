<template>
    <div id="app">
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>Browse Job</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section id="featured" class="section bg-cyan">
            <div class="container">
                <div class="row">
                    <div v-for="job in jobs" :key="job.id" class="col-lg-4 col-md-6 col-xs-12">
                        <div class="job-featured">
                            <div class="icon">
                                <img src="assets/img/features/img1.png" alt="">
                            </div>
                            <div class="content">
                                <h3>{{ job.title }}</h3>
                                <p class="brand">{{ job.category}}</p>
                                <div class="tags">
                                    <span><i class="lni lni-map-marker"></i> {{ job.location }}</span>
                                    <span ><i class="lni lni-user"></i>{{ job.employer.name }}</span>
                                </div>
                                <inertia-link :href="route('jobs.details', job.slug)"><span class="full-time">View</span></inertia-link>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center mt-4">
                        <a href="#" class="btn btn-common">Browse All Jobs</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import App from "../App";
export default {
    layout: App,
    props: {
        jobs: Array,
        applied: Array,
    },
}
</script>

<style scoped>

</style>
