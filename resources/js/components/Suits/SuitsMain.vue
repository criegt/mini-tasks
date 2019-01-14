<template>
    <div class="m-2">
        <h5>My suits</h5>
        <ul class="list-unstyled">
            <li class="mb-2"
                v-for="suit in suits" :key="suit.id">
                <router-link to="/">
                    <small>{{ suit.title }}</small>
                </router-link>
            </li>
        </ul>
        <h5 class="mt-2">Shared with my</h5>
        <ul class="list-unstyled">
            <li class="mb-2"
                v-for="suit in suits" :key="suit.id">
                <router-link to="/">
                    <small>{{ suit.title }}</small>
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

