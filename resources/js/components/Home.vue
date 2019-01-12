<template>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <suits></suits>
            </div>
            <div class="col-md-8">
                <tasks></tasks>
            </div>
        </div>
    </div>
</template>

<script>
import Tasks from './tasks/Tasks.vue'
import Suits from './suits/Suits.vue'

export default {
    mounted() {
        console.log('Component mounted.')
    },
    components:{
        'tasks': Tasks,
        'suits': Suits
    }
}
</script>
