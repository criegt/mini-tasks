<template>
    <div>
        <add-step 
            :task-id="taskId"
            @step-created="addStep">
        </add-step>
        <ul class="list-unstyled">
            <step-item
                v-for="step in steps" 
                :key="step.id"
                :step="step"
                @step-deleted="deleteStep">
            </step-item>
        </ul>
    </div>
</template>

<script>
import AddStep from './AddStep.vue'
import StepItem from './StepItem.vue'

export default {
    props: {
        steps: Array,
        taskId: Number
    },
    methods: {
        addStep(step) {
            this.steps.push(step)
        },
        deleteStep(step) {
            let index = this.steps.indexOf(step)
            if (index !== -1) this.steps.splice(index, 1)
        }
    },
    components: {
        'add-step': AddStep,
        'step-item': StepItem
    }
}
</script>



