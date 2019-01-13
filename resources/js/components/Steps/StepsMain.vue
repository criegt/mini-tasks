<template>
    <div>
        <add-step 
            :task-id="taskId"
            @step-created="addStep">
        </add-step>
        <ul class="list-unstyled">
            <li class="border-bottom py-2"
                v-for="step in steps" 
                :key="step.id"
                @click="step.state = !step.state">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" 
                        :id="`state${step.id}Check`"
                        v-model="step.state">
                    <label class="custom-control-label" 
                        :for="`state${step.id}Check`"
                        :class="{ 'text-muted': step.state, 'line': step.state }">
                        {{ step.content }}
                    </label>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
import AddStep from './AddStep.vue'

export default {
    props: {
        steps: Array,
        taskId: Number
    },
    methods: {
        addStep(step) {
            this.steps.push(step)
        }
    },
    components: {
        'add-step': AddStep
    }
}
</script>

<style>
.line {
  text-decoration: line-through;
}
</style>



