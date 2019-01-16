<template>
    <div class="modal fade" :id="modalId" tabindex="-1" role="dialog" aria-labelledby="addSuitModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form @submit.prevent="createSuit()">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addSuitModalTitle">Add Suit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Title"
                                v-model="suit.title">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Description" 
                                v-model="suit.description">
                            </textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { Suit } from '../../models/suit'

export default {
    props: {
        addSuitOpened: 0
    },
    data() {
        return {
            suit: new Suit(),
            modalId: 'addSuitModal'
        }
    },
    methods: {
        createSuit() {
            if(!this.suit.title) return
            
            let url = '/api/suits'
            this.$http.post(url, this.suit)
                .then(response => {
                    this.$alert.success({ title: 'Suite added correctly' })
                    this.suit = new Suit()
                    this.$emit('suit-created', response.data)
                })
                .catch(error => {
                    this.$alert.error({ title: error })
                })
        }
    },
    watch: {
        addSuitOpened() {
            $(`#${this.modalId}`).modal('show')
        }
    }
}
</script>
