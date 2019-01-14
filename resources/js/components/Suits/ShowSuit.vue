<template>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3 border-right">
                <suits-main></suits-main>
            </div>
            <div class="col-md-6">
                <tasks-main></tasks-main>
            </div>
            <div class="col-md-3 border-left">
                <div class="row ml-2 sticky-top">
                    <task-options></task-options>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import TasksMain from '../Tasks/TasksMain.vue'
import SuitsMain from './SuitsMain.vue'
import TaskOptions from '../Tasks/TaskOptions.vue'

export default {
    mounted() {
        //console.log('Component mounted.')
    },
    components:{
        'tasks-main': TasksMain,
        'suits-main': SuitsMain,
        'task-options': TaskOptions
    }
}
</script>
