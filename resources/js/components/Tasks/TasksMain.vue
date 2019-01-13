<template>
    <div>
        <div class="row sticky-top">
            <div class="col-sm-12">
                <add-task @task-created="addTask"></add-task>
            </div>
        </div>
        <task-item
            v-for="task in tasks" 
            :key="task.id"
            :task="task"
            @task-deleted="deleteTask"></task-item>
        <infinite-loading spinner="waveDots" class="mt-4"
            @infinite="infiniteHandler">
            <div slot="no-more">
                <span class="text-muted">
                    That's all
                </span>
            </div>
            <div slot="no-results">Here is not more results</div>
        </infinite-loading>
    </div>
</template>

<script>
import axios from 'axios'
import InfiniteLoading from 'vue-infinite-loading'
import AddTask from './AddTask.vue'
import TaskItem from './TaskItem.vue'

export default {
    data() {
        return {
            selectedTask: {},
            tasks: [],
            page: 0
        }
    },
    methods: {
        infiniteHandler($state) {
            this.page++
            let url = '/api/tasks?page=' + this.page
            axios.get(url).then(response => {
                let tasks = response.data.data
                if (tasks.length) {
                    this.tasks = this.tasks.concat(tasks)
                    $state.loaded()
                } else {
                    $state.complete()
                }
            }).catch(error => {
                console.log(error)
            })
        },
        refreshTasks() {
            this.page = 1
            let url = '/api/tasks?page=' + this.page
            axios.get(url)
                .then(response => {
                    this.tasks = response.data.data
                })
                .catch(error => {})
        },
        addTask(task) {
            this.tasks.unshift(task)
        },
        deleteTask(task) {
            this.tasks = this.tasks.filter((t) => t !== task)
            if(!this.tasks.length) {
                this.refreshActivities()
            }
        }
    },
    components: {
        'add-task': AddTask,
        'infinite-loading': InfiniteLoading,
        'task-item': TaskItem
    }
}
</script>
