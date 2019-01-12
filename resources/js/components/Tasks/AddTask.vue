<template>
    <div class="card shadow-sm border-0 my-2">
        <div class="card-body">
            <form method="post" @submit.prevent="createTask()">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Task title" v-model="task.title">
                    <div class="input-group-prepend">
                        <button class="btn btn-default" type="submit">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <a href="#" class="dropdown-toggle" @click.prevent="optionsActive = !optionsActive">More</a>
                    </div>
                </div>
                <transition name="fade">
                    <div class="row" v-if="optionsActive">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <textarea class="form-control" rows="3" placeholder="Write something here ..." v-model="task.content"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="input-group">
                                <select class="form-control mt-2">
                                    <option value="0">Select one suit</option>
                                    <option v-for="suit in suits" :key="suit.id" :value="suit.id">{{ suit.title }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </transition>
            </form>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    class Task {

        constructor() {
            this.title
            this.content
            this.state
            this.suid_id
        }
    }

    export default {
        data() {
            return {
                task: new Task(),
                suits: [],
                selectedSuit: 0,
                optionsActive: false
            }
        },
        created() {
            this.getSuits()
        },
        methods: {
            createTask() {
                let url = '/api/tasks'
                axios.post(url, this.task)
                    .then(response => {
                        console.log(response.data)
                        this.task = new Task()
                        this.$emit('task-created', response.data)
                    }).catch(error => {
                        console.log(error)
                    })
            },
            getSuits() {
                let url = '/api/suits'
                axios.get(url)
                    .then(response => {
                        console.log(response.data)
                        this.suits = response.data
                    }).catch(error => {
                        console.log(error)
                    })
            }
        },
        mounted() {
        }
    }

</script>

<style>
    .fade-enter-active,
    .fade-leave-active {
        transition: opacity .5s;
    }

    .fade-enter,
    .fade-leave-to

    /* .fade-leave-active below version 2.1.8 */
        {
        opacity: 0;
    }

</style>
