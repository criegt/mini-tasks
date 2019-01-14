<template>
    <div class="m-2">
        <h5>My suits</h5>
        <span class="text-muted"
            v-if="!suits.length">
            <strong>Loading...</strong>
        </span>
        <ul class="list-unstyled"
            v-else>
            <li class="mb-2"
                v-for="suit in suits" :key="suit.id">
                <router-link :to="`/suits/${suit.id}`" class="text-primary">
                    <small><strong>{{ suit.title }}</strong></small>
                </router-link>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            suits: []
        }
    },
    created() {
        this.getSuits()
    },
    methods: {
        getSuits() {
            let url = '/api/suits'
            axios.get(url).then(response => {
                this.suits = response.data
            }).catch(error => {
                console.log(error)
            })
        }
    }
}
</script>

