<template>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-3">
                <router-link to="/">
                    Go Home
                </router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="card border-0 mt-4 pt-2 px-2">
                    <div class="card-title"
                        v-if="!task.id">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="ml-3">
                                    <span class="text-muted"><strong>Wait a second....</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-else>
                        <div class="card-title">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="ml-3">
                                        <span class="text-primary"><strong> {{ task.title }}</strong></span>
                                        <h6 class="text-muted"><small>{{ formateDate }}</small></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <show-steps :steps="task.steps"></show-steps>
                            <div class="row">
                                <div class="col-sm-12">
                                    <span class="text-muted"
                                        v-if="!task.content">
                                        Content its empty...
                                    </span>
                                    <span v-if="task.content"
                                        v-html="task.content">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <span class="border-bottom"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import moment from 'moment'
import ShowSteps from '../Steps/ShowSteps.vue'

export default {
    props: {
        id: Number
    },
    data() {
        return {
            task: {}
        }
    },
    created() {
        this.getTask()
    },
    methods: {
        getTask() {
            let url = '/api/tasks/' + this.$route.params.id
            this.$http.get(url)
                .then(response => {
                    this.task = response.data
                })
                .catch(error => {
                    this.$alert.error({ title: 'Error: try again' })                    
                })
        }
    },
    computed: {
        formateDate() {
            return moment(this.task.created_at).fromNow()
        }
    },
    components: {
        'show-steps': ShowSteps
    }
}
</script>
