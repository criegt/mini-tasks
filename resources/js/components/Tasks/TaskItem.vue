<template>
    <div class="card border-0 mt-4 pt-2 px-2"
        @mouseover="deleteActive = true"
        @mouseleave="deleteActive = false">
        <div class="card-title">
            <div class="row">
                <div class="col-sm-9">
                    <div class="ml-3">
                        <span class="text-primary"><strong> {{ task.title }}</strong></span>
                        <h6 class="text-muted"><small>{{ formateDate }}</small></h6>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="float-right">
                        <button class="btn btn-outline-default btn-sm" type="button" id="taskOptionsdropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="taskOptionsdropdownMenu">
                            <a class="dropdown-item" href="#"
                                @click.prevent="needEditTask(task)">
                                Edit
                            </a>
                            <a class="dropdown-item" href="#"
                                @click.prevent="deleteTask(task)">
                                Delete
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <steps-main :task-id="task.id" :steps="task.steps"></steps-main>
            <div class="row">
                <div class="col-sm-12">
                    <span v-if="!editContentActive"
                        @click="editContentActive = !editContentActive"
                        v-html="task.content">
                    </span>
                    <textarea class="form-control" :id="`stepContent${task.id}Textarea`"
                        v-if="editContentActive"
                        v-model="task.content"
                        @keyup.shift.enter="editContentActive = !editContentActive"
                        @blur="editContentActive = !editContentActive"
                        v-focus>
                    </textarea>
                </div>
            </div>
        </div>
        <span class="border-bottom"></span>
    </div>
</template>

<script>
import axios from 'axios'
import moment from 'moment'

import StepsMain from '../Steps/StepsMain.vue'

export default {
    props: {
        task: Object
    },
    data() {
        return {
            deleteActive: false,
            editContentActive: false
        }
    },
    created() {
    },
    methods: {
        deleteTask(task) {
            let url = '/api/tasks/' + task.id
            axios.delete(url)
                .then(response => {
                    this.$emit('task-deleted', task)
                })
                .catch(error => {
                    console.log(error)
                })
        },
        needEditTask(task) {
            this.$emit('need-edit-task', task)
        }
    },
    computed: {
        formateDate() {
            return moment(this.task.created_at).fromNow()
        }
    },
    directives: {
        focus: {
            inserted(el) {
                el.focus()
            }
        }
    },
    components: {
        'steps-main': StepsMain
    }
}
</script>

<style>
.card-title{
    margin-bottom: 0;
}
</style>
