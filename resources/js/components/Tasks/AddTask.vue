<template>
    <div class="card shadow-sm border-0 mb-2">
        <div class="card-body">
            <form method="post" @submit.prevent="createTask()">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Task title" v-model="task.title">
                    <div class="input-group-prepend">
                        <button class="btn btn-default" type="submit">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <a href="#" class="dropdown-toggle" @click.prevent="moreActive = !moreActive">More</a>
                    </div>
                </div>
                <transition name="fade">
                    <div class="row" v-if="moreActive">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <textarea class="form-control" rows="3" placeholder="Write something here ..." v-model="task.content"></textarea>
                            </div>
                        </div>
                    </div>
                </transition>
            </form>
        </div>
        <span class="border-bottom"></span>
    </div>
</template>

<script>
    import { Task } from '../../models/task';

    export default {
        data() {
            return {
                task: new Task(),
                moreActive: false
            }
        },
        methods: {
            createTask() {
                if(!this.task.title) return
                let url = '/api/tasks'
                this.$http.post(url, this.task)
                    .then(response => {
                        this.task = new Task()
                        let task = response.data
                        if(!task.steps) {
                            task.steps = []
                        }
                        this.$emit('task-created', task)
                        this.$alert.success({ title: 'Task created'})
                    }).catch(error => {
                        this.$alert.error({ title: 'Error: try again' })
                    })
            }
        }
    }
</script>

<style>
    .fade-enter-active,
    .fade-leave-active {
        transition: opacity .5s;
    }

    .fade-enter,
    .fade-leave-to
    {
        opacity: 0;
    }
</style>
