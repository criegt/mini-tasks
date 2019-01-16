<template>
    <li class="border-bottom py-2"
        @mouseenter="deleteActive = true"
        @mouseleave="deleteActive = false">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" 
                :id="`state${step.id}Check`"
                v-model="step.state">
            <label class="custom-control-label" 
                :for="`state${step.id}Check`"
                :class="{ 'text-muted': step.state, 'line': step.state }">
                {{ step.content }}
            </label>
            <button class="btn btn-default btn-sm float-right"
                v-show="deleteActive"
                @click="deleteStep(step)">
                <i class="far fa-trash-alt"></i>
            </button>
        </div>
    </li>
</template>

<script>

export default {
    props: {
        step: Object
    },
    data() {
        return {
            deleteActive: false
        }
    },
    methods: {
        deleteStep(step) {
            let url = '/api/steps/' + step.id
            this.$http.delete(url)
                .then(response => {
                    this.$emit('step-deleted', step)
                })
                .catch(error => {
                    this.$alert.error({ title: 'Error: try again' })
                })
        },
        updateState() {
            let url = '/api/steps/' + this.step.id
            this.$http.put(url, this.step)
                .catch(error => {
                    this.$alert.error({ title: 'Error: try again' })
                })
        }
    },
    watch: {
        'step.state'() {
            this.updateState()
        }
    }
}
</script>

<style>
.line {
  text-decoration: line-through;
}
</style>
