<template>
    <ul class="list-unstyled">
        <show-step
            v-for="step in steps" 
            :key="step.id"
            :step="step">
        </show-step>
    </ul>
</template>

<script>
import ShowStep from './ShowStep.vue'

export default {
    props: {
        steps: Array
    },
    components: {
        'show-step': ShowStep
    }
}
</script>
