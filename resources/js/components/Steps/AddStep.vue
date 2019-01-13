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
            <input type="text" class="form-control" placeholder="Step"
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
import axios from 'axios'

class Step {

    constructor() {
        this.content
        this.task_id
    }
}

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
            let url = '/api/steps'
            axios.post(url, this.step)
                .then(response => {
                    this.step = new Step()
                    this.step.task_id = this.taskId
                    this.$emit('step-created', response.data)
                })
                .catch(error => {
                    console.log(error)
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
