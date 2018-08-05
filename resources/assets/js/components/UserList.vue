<template>
    <div class="row">
        <div class="col-3" v-for="user in users">
            <div class="card">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex align-items-center">
                        <img class="avatar avatar-md mr-3" v-bind:src="user.gravatar">
                        <div>
                            <a v-bind:href="'@' + user.username" class="text-default">{{ user.name }}</a>
                            <small class="d-block text-muted">{{ user.username }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                users: []
            }
        },

        mounted() {
            this.getUsers();
        },

        methods: {
            async getUsers() {
                let self = this;
                await axios.get('/api/users')
                    .then(function (response) {
                        self.users = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

        }
    }
</script>

<style scoped>

</style>
