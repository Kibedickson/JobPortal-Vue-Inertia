<template>
    <div>
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>Edit Job</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9 col-md-12 col-xs-12">
                        <div class="post-job box">
                            <h3 class="job-title">Edit Job</h3>
                            <form class="form-ad" v-on:submit.prevent="submit">
                                <div class="form-group">
                                    <label class="control-label"><strong>Job Title</strong></label>
                                    <input
                                        type="text"
                                        name="title"
                                        id="title"
                                        class="form-control"
                                        placeholder="Write job title"
                                        v-model="form.title"
                                    >
                                    <span class="text-danger" role="alert">
                                        <strong>{{ errors.title }}</strong>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label"><strong>Location</strong></label>
                                    <input
                                        type="text"
                                        name="location"
                                        id="location"
                                        class="form-control"
                                        placeholder="e.g.Ruiru, Kimbo"
                                        v-model="form.location"
                                    >
                                    <span class="text-danger" role="alert">
                                        <strong>{{ errors.location }}</strong>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label"><strong>Job Description</strong></label>
                                    <textarea
                                        type="text"
                                        rows="4"
                                        name="description"
                                        id="description"
                                        class="form-control"
                                        placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem quia aut modi fugit, ratione saepe perferendis odio optio repellat dolorum voluptas excepturi possimus similique veritatis nobis. Provident cupiditate delectus, optio?"
                                        v-model="form.description"
                                    >
                                    </textarea>
                                    <span class="text-danger" role="alert">
                                        <strong>{{ errors.description }}</strong>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label"><strong>Category</strong></label>
                                    <div class="search-category-container">
                                        <label class="styled-select">
                                            <select
                                                name="category"
                                                id="category"
                                                class="browser-default custom-select"
                                                v-model="form.category"
                                            >
                                                <option disabled selected>All Categories</option>
                                                <option>Finance</option>
                                                <option>IT & Engineering</option>
                                                <option>Education/Training</option>
                                                <option>Art/Design</option>
                                                <option>Sale/Markting</option>
                                                <option>Healthcare</option>
                                                <option>Science</option>
                                                <option>Food Services</option>
                                            </select>
                                        </label>
                                    </div>
                                    <span class="text-danger" role="alert">
                                        <strong>{{ errors.category }}</strong>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label"><strong>Deadline</strong></label>
                                    <input
                                        type="date"
                                        name="deadline"
                                        id="deadline"
                                        data-provide="datepicker"
                                        data-date-end-date="0d"
                                        class="form-control"
                                        placeholder="yyyy-mm-dd"
                                        v-model="form.deadline"
                                    >
                                    <span class="text-danger" role="alert">
                                        <strong>{{ errors.deadline }}</strong>
                                    </span>
                                </div>
                                <button type="submit" class="btn btn-common">Edit job
                                    <span v-if="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                </button>
                            </form>
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
    name: "edit",
    layout: App,
    props: {
        errors: Object,
        job: Object,
    },
    data () {
        return {
            loading: false,
            form: {
                title: this.job.title,
                location: this.job.location,
                description: this.job.description,
                category: this.job.category,
                deadline: this.job.deadline,
            }
        }
    },
    methods: {
        submit(){
            this.loading = true
            this.$inertia.patch(this.route('jobs.update', this.job.slug), this.form)
            .then(()=> this.loading = false)
        }
    }
}
</script>

<style scoped>

</style>
