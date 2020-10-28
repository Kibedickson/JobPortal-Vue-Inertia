<template>
    <div>
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>Manage Proposals</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-header">
                                <p>Job Details</p>
                            </div>
                            <div class="panel-body">
                                <table class="table table-borderless">
                                    <tbody>
                                    <tr>
                                        <th>Candidate</th>
                                        <td v-if="job.candidate">{{ job.candidate.name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ job.title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Location</th>
                                        <td>{{ job.location }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{{ job.description }}</td>
                                    </tr>
                                    <tr>
                                        <th>Deadline</th>
                                        <td>{{ job.deadline }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-header">Proposals</div>
                            <div class="panel-body">
                                <table class="table table-borderless">
                                    <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(proposal, index) in job.proposals">
                                        <td>{{ proposal.candidate.name}}</td>
                                        <td>{{ proposal.candidate.email}}</td>
                                        <td>
                                            <button v-if="job.candidate_id === proposal.candidate_id" class="btn btn-common" style="font-size: 10px; padding: 3px 10px; text-transform: capitalize;">Selected</button>
                                            <button @click="update(proposal.candidate_id, job.slug)" v-if="job.candidate_id !== proposal.candidate_id" class="btn btn-common" style="font-size: 10px; padding: 3px 10px; text-transform: capitalize;">Select
                                                <span v-if="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import App from "../App";

export default {
    name: "show",
    layout: App,
    props: {
        job: Object,
        toast: Object,
    },
    data(){
      return {
          loading: false,
          id: {}
      }
    },
    methods: {
        update(id, slug) {
            this.id.candidate_id = id
            this.loading = true
            this.$inertia.patch(this.route('proposals.update', slug), this.id)
            .then(()=> this.loading = false)
        }
    }
}
</script>

<style scoped>

</style>
