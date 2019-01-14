<template>
    <li class="border-bottom py-2">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" 
                :id="`state${step.id}Check`"
                v-model="step.state" disabled>
            <label class="custom-control-label" 
                :for="`state${step.id}Check`"
                :class="{ 'text-muted': step.state, 'line': step.state }">
                {{ step.content }}
            </label>
        </div>
    </li>
</template>

<script>
export default {
    props: {
        step: Object
    }
}
</script>
