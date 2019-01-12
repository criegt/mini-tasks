<template>
    <div>
        <add-task></add-task>
        <task-item
            v-for="task in tasks" 
            :key="task.id"
            :task="task"></task-item>
        <infinite-loading @infinite="infiniteHandler"></infinite-loading>
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
                    $state.completed()
                }
            }).catch(error => {
                console.log(error)
            })
        }
    },
    components: {
        'add-task': AddTask,
        'infinite-loading': InfiniteLoading,
        'task-item': TaskItem
    }
}
</script>
