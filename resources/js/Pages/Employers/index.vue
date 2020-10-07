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


        <section class="job-browse section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <div class="wrap-search-filter row">
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <input type="text" class="form-control" placeholder="Keyword: Name, Tag">
                            </div>
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <input type="text" class="form-control" placeholder="Location: City, State, Zip">
                            </div>
                            <div class="col-lg-2 col-md-2 col-xs-12">
                                <button type="submit" class="btn btn-common float-right">Filter</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <div class="col-lg-12 col-md-12 col-xs-10">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Deadline</th>
                                        <th scope="col">Proposals</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="job in jobs">
                                        <td>{{ job.title }}</td>
                                        <td>{{ job.description }}</td>
                                        <td>{{ job.location }}</td>
                                        <td>{{ job.deadline }}</td>
                                        <td><inertia-link :href="route('jobs.show', job.slug)" class="btn btn-common" style="font-size: 10px; padding: 3px 10px; text-transform: capitalize;">{{ job.proposals.length }}</inertia-link></td>
                                        <td><inertia-link :href="route('jobs.edit', job.slug)" class="btn btn-common" style="font-size: 10px; padding: 3px 10px; text-transform: capitalize;">Edit</inertia-link></td>
                                        <td>
                                            <button v-on:click="destroy(job)" class="btn btn-common" style="font-size: 10px; padding: 3px 10px; text-transform: capitalize;">Delete
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <ul class="pagination">

                            </ul>

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
        jobs: Array,
    },
    data(){
        return {
        }
    },
    methods: {
        destroy(job){
            job._method = 'DELETE'
            this.$inertia.post('/jobs/'+ job.slug, job)
        }
    }
}
</script>

<style scoped>

</style>
