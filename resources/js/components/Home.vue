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
                    <task-properties></task-properties>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import TasksMain from './tasks/TasksMain.vue'
import SuitsMain from './suits/SuitsMain.vue'
import TaskProperties from './tasks/TaskProperties.vue'

export default {
    mounted() {
        //console.log('Component mounted.')
    },
    components:{
        'tasks-main': TasksMain,
        'suits-main': SuitsMain,
        'task-properties': TaskProperties
    }
}
</script>
