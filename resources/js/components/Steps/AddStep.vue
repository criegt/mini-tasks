<template>
    <form method="POST" 
        @submit.prevent="createStep">
        <span class="text-muted pb-2"
            v-if="!addActive"
            @click="addActive = true">
            Add step...
        </span>
        <div class="input-group"
            v-if="addActive">
            <input type="text" class="form-control form-control-sm" placeholder="Step"
                v-model="step.content"
                @blur="addActive = false"
                v-focus>
            <div class="input-group-prepend">
                <button class="btn btn-default btn-sm" type="submit">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
    </form>
</template>

<script>
import { Step } from '../../models/step'

export default {
    props: {
        taskId: Number
    },
    data() {
        return {
            addActive: false,
            step: new Step()
        }
    },
    created() {
        this.step.task_id = this.taskId
    },
    methods: {
        createStep() {
            if(!this.step.content) return
            let url = '/api/steps'
            this.$http.post(url, this.step)
                .then(response => {
                    this.step = new Step()
                    this.step.task_id = this.taskId
                    this.$emit('step-created', response.data)
                })
                .catch(error => {
                    this.$alert.error({ title: 'Error: try again' })
                })
        }
    },
    directives: {
        focus: {
            inserted(el) {
                el.focus()
            }
        }
    }
}
</script>
