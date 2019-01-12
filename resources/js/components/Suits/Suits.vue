<template>
    <div>
        <h4>Suits</h4>
        <ul class="list-group">
            <li class="list-group-item"
                v-for="suit in suits" :key="suit.id">
                {{ suit.title }}
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
                console.table(response.data)
                this.suits = response.data
            }).catch(error => {
                console.log(error)
            })
        }
    }
}
</script>

