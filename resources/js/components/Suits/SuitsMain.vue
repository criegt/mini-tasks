<template>
    <div class="m-2">
        <h5>My suits</h5>
        <span class="text-muted"
            v-if="!suits.length">
            <strong>Loading...</strong>
        </span>
        <ul class="list-unstyled"
            v-else>
            <li class="mb-2">
                <router-link to="/home" class="text-primary">
                    <small><strong><i class="far fa-dot-circle mr-2"></i>Show all</strong></small>
                </router-link>
            </li>
            <li class="mb-2">
                <a href="#" class="text-muted"
                    @click="addSuitOpened++">
                    <small><strong><i class="fas fa-plus mr-2"></i>Add suit</strong></small>
                </a>
            </li>
            <li class="mb-2"
                v-for="suit in suits" :key="suit.id">
                <router-link :to="`/suits/${suit.id}`" class="text-primary">
                    <small><strong><i class="far fa-circle mr-2"></i>{{ suit.title }}</strong></small>
                </router-link>
                <a href="#" class="text-muted ml-2"
                    @click.prevent="openEditSuit(suit)">
                    <small><strong><i class="far fa-edit mr-2"></i>Edit suit</strong></small>
                </a>
            </li>
        </ul>
        <add-suit 
            :add-suit-opened="addSuitOpened"
            @suit-created="addSuit">
        </add-suit>
        <edit-suit 
            :edit-suit-opened="editSuitOpened"
            :suit="selectedSuit"
            @suit-updated="editSuit"
            @suit-deleted="deleteSuit">
        </edit-suit>
    </div>
</template>

<script>
import AddSuit from './AddSuit.vue'
import EditSuit from './EditSuit.vue'

export default {
    data() {
        return {
            suits: [],
            addSuitOpened: 0,
            editSuitOpened: 0,
            selectedSuit: {}
        }
    },
    created() {
        this.getSuits()
    },
    methods: {
        getSuits() {
            let url = '/api/suits'
            this.$http.get(url).then(response => {
                this.suits = response.data
            }).catch(error => {
                this.$alert.error({ title: 'Error: try again' })
            })
        },
        addSuit(suit) {
            this.suits.unshift(suit)
        },
        openEditSuit(suit) {
            this.selectedSuit = suit
            this.editSuitOpened++
        },
        editSuit(suit) {
            let index = this.suits.findIndex(s => s.id === suit.id)
            let newSuit = {...this.selectedSuit, ...suit}
            this.$set(this.suits, index, newSuit)
        },
        deleteSuit(suit) {
            this.suits = this.suits.filter((s) => s.id !== suit.id)
        }
    },
    components: {
        'add-suit': AddSuit,
        'edit-suit': EditSuit
    }
}
</script>

