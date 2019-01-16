<template>
    <div class="modal fade" :id="modalId" tabindex="-1" role="dialog" aria-labelledby="editSuitModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form @submit.prevent="updateSuit()">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addSuitModalTitle">Edit Suit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Title"
                                v-model="suitToEdit.title">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Description" 
                                v-model="suitToEdit.description">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <a class="text-danger" href="#"
                                @click.prevent="deleteSuit()">
                                Delete
                            </a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
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
        editSuitOpened: 0,
        suit: Object
    },
    data() {
        return {
            suitToEdit: {},
            modalId: 'editSuitModal'
        }
    },
    methods: {
        updateSuit() {
            if(!this.suitToEdit.title) return
            
            let url = '/api/suits/' + this.suitToEdit.id
            this.$http.put(url, this.suitToEdit)
                .then(response => {
                    this.$alert.success({ title: 'Suite edited correctly' })
                    this.$emit('suit-updated', this.suitToEdit)
                })
                .catch(error => {
                    this.$alert.error({ title: error })
                })
        },
        deleteSuit() {
            let url = '/api/suits/' + this.suitToEdit.id
            this.$http.delete(url)
                .then(response => {
                    this.$alert.success({ title: 'Suite deleted correctly' })
                    this.$emit('suit-deleted', this.suitToEdit)
                    this.closeModal()
                })
                .catch(error => {
                    this.$alert.error({ title: 'Error: Try again' })
                })
        },
        closeModal(){
            $(`#${this.modalId}`).modal('hide')
        }
    },
    watch: {
        editSuitOpened() {
            $(`#${this.modalId}`).modal('show')
            this.suitToEdit =  {...this.suit}
        }
    }
}
</script>
