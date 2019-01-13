<template>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3 border-right">
                <suits></suits>
            </div>
            <div class="col-md-6">
                <tasks></tasks>
            </div>
            <div class="col-md-3 border-left">
                <div class="row ml-2 sticky-top">
                    <suits></suits>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Tasks from './tasks/Tasks.vue'
import Suits from './suits/Suits.vue'

export default {
    mounted() {
        //console.log('Component mounted.')
    },
    components:{
        'tasks': Tasks,
        'suits': Suits
    }
}
</script>
