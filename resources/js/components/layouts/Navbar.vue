<template>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <div class="container">
            <router-link class="navbar-brand" to="/home">
                <i class="fas fa-tasks mr-2"></i>
                <strong>{{ title }}</strong>
            </router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="'Toggle navigation'">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="text-white dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-user-circle" style="font-size:1.5rem;"></i> <span class="caret"></span>
                        </a>

                        <div id="navbarMenuDropdown" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <router-link to="/about" class="dropdown-item">About</router-link>
                            <div class="dropdown-divider"></div>
                            <form method="POST"
                                @submit.prevent="logout()">
                                <button type="submit" class="dropdown-item">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            title: 'mini tasks',
            user: {
                name: 'Test'
            }
        }
    },
    methods: {
        logout() {
            let url = 'logout'
            axios.post(url, {}).then(response => {
                location.href = '/'
            }).catch(error => {
                console.log(error)
            })
        }
    }
}
</script>

<style>
#navbarMenuDropdown {
    z-index: 100000;
}
</style>
