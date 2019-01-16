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
            @task-deleted="deleteTask"
            @need-edit-task="openEditTask">
        </task-item>
        <edit-task 
            :task="selectedTask" 
            :task-change="taskChange"
            @task-updated="editTask">
        </edit-task>
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
import InfiniteLoading from 'vue-infinite-loading'
import AddTask from './AddTask.vue'
import TaskItem from './TaskItem.vue'
import EditTask from './EditTask.vue'

export default {
    data() {
        return {
            selectedTask: {},
            taskChange: 0,
            tasks: [],
            page: 0
        }
    },
    methods: {
        infiniteHandler($state) {
            this.page++
            let url = '/api/tasks?page=' + this.page
            this.$http.get(url).then(response => {
                let tasks = response.data.data
                if (tasks.length) {
                    this.tasks = this.tasks.concat(tasks)
                    $state.loaded()
                } else {
                    $state.complete()
                }
            }).catch(error => {
                this.$alert.error({ title: 'Error: try again' })                
            })
        },
        refreshTasks() {
            this.page = 1
            let url = '/api/tasks?page=' + this.page
            this.$http.get(url)
                .then(response => {
                    this.tasks = response.data.data
                })
                .catch(error => {
                    this.$alert.error({ title: 'Error: try again' })
                })
        },
        addTask(task) {
            this.tasks.unshift(task)
        },
        editTask(task) {
            let index = this.tasks.findIndex(t => t.id === task.id)
            let newTask = {...this.selectedTask, ...task}
            this.$set(this.tasks, index, newTask)
        },
        deleteTask(task) {
            this.tasks = this.tasks.filter((t) => t !== task)
            if(!this.tasks.length) {
                this.refreshActivities()
            }
        },
        openEditTask(task) {
            this.selectedTask = task
            this.taskChange++
        }
    },
    components: {
        'add-task': AddTask,
        'infinite-loading': InfiniteLoading,
        'task-item': TaskItem,
        'edit-task': EditTask
    }
}
</script>
