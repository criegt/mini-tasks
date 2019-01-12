<template>
    <div class="card border-light mb-2"
        @mouseover="deleteActive = true"
        @mouseleave="deleteActive = false">
        <div class="card-body">
            <div class="card-title">
                <div class="row">
                    <div class="col-sm-9">
                        <span class="text-primary">{{ task.title }}</span>
                    </div>
                    <div class="col-sm-3">
                        <div class="float-right">
                            <button class="btn btn-outline-secondary btn-sm" type="button" id="taskOptionsdropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="taskOptionsdropdownMenu">
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
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    props: {
        task: Object
    },
    data() {
        return {
            deleteActive: false
        }
    },
    created() {},
    methods: {
        deleteTask(task) {
            let url = 'tasks/' + task.id
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
    }
}
</script>

<style>
</style>
