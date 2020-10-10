<template>
    <div>
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>Create Resume</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section id="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9 col-md-12 col-xs-12">
                        <div class="add-resume box">
                            <form class="form-ad" v-on:submit.prevent="submit">
                                <h3>Basic information</h3>
                                <div class="form-group">
                                    <label class="control-label"><strong>Profession Title</strong></label>
                                    <input
                                        type="text"
                                        name="title"
                                        id="title"
                                        class="form-control"
                                        placeholder="Headline (e.g. Front-end developer)"
                                        v-model="form.title"
                                        autofocus
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
                                        class="form-control"
                                        placeholder="Location, e.g"
                                        v-model="form.location"
                                    >
                                    <span class="text-danger" role="alert">
                                        <strong>{{ errors.location }}</strong>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label"><strong>Age</strong></label>
                                    <input
                                        type="number"
                                        name="age"
                                        class="form-control"
                                        placeholder="Years old"
                                        v-model="form.age"
                                    >
                                    <span class="text-danger" role="alert">
                                        <strong>{{ errors.age }}</strong>
                                    </span>
                                </div>
                                <h3>Education</h3>
                                <div class="form-group">
                                    <label class="control-label"><strong>Degree</strong></label>
                                    <input
                                        type="text"
                                        name="degree"
                                        class="form-control"
                                        placeholder="Degree, e.g. Bachelor"
                                        v-model="form.degree"
                                    >
                                    <span class="text-danger" role="alert">
                                        <strong>{{ errors.degree }}</strong>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label"><strong>Field of Study</strong></label>
                                    <input
                                        type="text"
                                        name="field"
                                        class="form-control"
                                        placeholder="Major, e.g Computer Science"
                                        v-model="form.field"
                                    >
                                    <span class="text-danger" role="alert">
                                        <strong>{{ errors.field }}</strong>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label"><strong>School</strong></label>
                                    <input
                                        type="text"
                                        name="school"
                                        class="form-control"
                                        placeholder="School name, e.g. Maseno University"
                                        v-model="form.school"
                                    >
                                    <span class="text-danger" role="alert">
                                        <strong>{{ errors.school }}</strong>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label"><strong>Year of Completion</strong></label>
                                    <input
                                        type="text"
                                        name="year"
                                        class="form-control"
                                        placeholder="e.g 2014"
                                        v-model="form.year"
                                    >
                                    <span class="text-danger" role="alert">
                                        <strong>{{ errors.year }}</strong>
                                    </span>
                                </div>
                                <div class="divider"><h3>Skills</h3></div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label"><strong>Skill Name</strong></label>
                                            <input
                                                class="form-control"
                                                name="skill"
                                                placeholder="Skill name, e.g. HTML, CSS, PHP"
                                                type="text"
                                                v-model="form.skill"
                                            >
                                            <span class="text-danger" role="alert">
                                                <strong>{{ errors.skill }}</strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-common">Save Resume
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
    name: "create",
    layout: App,
    props: {
        errors: Object,
    },
    data () {
        return {
            loading: false,
            form: {
                title: '',
                location: '',
                age: '',
                degree: '',
                field: '',
                school: '',
                year: '',
                skill: '',
            }
        }
    },
    methods: {
        submit() {
            this.loading = true
            this.$inertia.post('/profiles', {
                title: this.form.title,
                location: this.form.location,
                age: this.form.age,
                degree: this.form.degree,
                field: this.form.field,
                school: this.form.school,
                year: this.form.year,
                skill: this.form.skill
            })
                .then(() => this.loading = false)
        }
    }
}
</script>

<style scoped>

</style>
