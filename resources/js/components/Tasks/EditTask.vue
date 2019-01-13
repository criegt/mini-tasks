<template>
    <div class="modal fade" :id="modalId" tabindex="-1" role="dialog" aria-labelledby="editTaskModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form @submit.prevent="updateTask(task)">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editTaskModalTitle">Edit Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Title"
                                v-model="task.title">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Content" 
                                v-model="task.content">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <h5>Suits</h5>
                            <ul class="list-unstyled">
                                <li class="border-top py-1 my-1"
                                    v-for="suit in suits" :key="suit.id">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox"
                                            :id="`suit${suit.id}Checkbox`"
                                            :value="suit"
                                            v-model="selectedSuits">
                                        <label class="custom-control-label" 
                                            :for="`suit${suit.id}Checkbox`">
                                            <span>{{ suit.title }}</span>
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import iziToast from 'izitoast'

    export default {
        props: {
            task: Object,
            taskChange: Number
        },
        data() {
            return {
                modalId: 'editTaskModal',
                suits: [],
                selectedSuits: []
            }
        },
        created() {
            this.getSuits()
        },
        methods: {
            updateTask() {

            },
            getSuits() {
                let url = '/api/suits'
                axios.get(url)
                    .then(response => {
                        this.suits = response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }
        },
        watch: {
            taskChange() {
                $(`#${this.modalId}`).modal('show')
            }
        }
    }
</script>
