<template>
    <div>
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6 col-xs-12">
                        <div class="breadcrumb-wrapper">
                            <div class="img-wrapper">
                                <img
                                    src="assets/img/about/company-logo.png"
                                    alt=""
                                />
                            </div>
                            <div class="content">
                                <h3 class="product-title">
                                    {{ job.title}}
                                </h3>
                                <p class="brand">{{ job.category }}</p>
                                <div class="tags">
                                    <span
                                        ><i class="lni-map-marker"></i>
                                        {{ job.location }}
                                        </span>
                                    <span
                                        ><i class="lni-calendar"></i>
                                        Deadline {{ job.deadline }}</span
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        <a v-if="proposal" href="#" class="btn btn-danger">Cancel</a>
                        <a v-else href="#" class="btn btn-common">Apply job</a>
                    </div>
                </div>
            </div>
        </div>

        <section class="job-detail section">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-8 col-md-12 col-xs-12">
                        <div class="content-area">
                            <h4>Job Description</h4>
                            <p>{{ job.description }}</p>
                            <h5>What You Need for this Position</h5>
                            <ul>
                                <li>- Objective-C</li>
                                <li>- iOS SDK</li>
                                <li>- XCode</li>
                                <li>- Cocoa</li>
                                <li>- ClojureScript</li>
                            </ul>
                            <a href="#" class="btn btn-common">Apply job</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-xs-12">
                        <div class="sideber">
                            <div class="widghet">
                                <h3>Job Location</h3>
                                <div class="maps">
                                    <div id="map" class="map-full">
                                        <iframe
                                            
                                        ></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="widghet">
                                <h3>Share This Job</h3>
                                <div class="share-job">
                                    <input
                                        type="text"
                                        name="url"
                                        class="form-control"
                                        v-model="this.slug"
                                        required=""
                                    >
                                </div>
                            </div>
                        </div>
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
        job: Object,
        proposal: ''
    },
    data(){
        return {
            slug: "https://jobportal-vue-inertia.test/job/"+this.job.slug
        }
    },
};
</script>

<style scoped></style>
