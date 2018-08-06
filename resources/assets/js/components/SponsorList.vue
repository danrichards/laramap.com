<template>
    <div>
        <h1 v-if="companySponsors.length">Companies</h1>
        <div class="row">
            <div class="col-3" v-for="company in companySponsors">
                <div class="card">
                    <a v-bind:href="company.web_link">
                        <img class="card-img-top" v-bind:src="company.avatar_path" v-bind:alt="company.name">
                    </a>

                    <div class="card-body d-flex flex-column">
                        <h4>
                            <a v-bind:href="company.web_link">{{ company.name }}</a>
                        </h4>
                        <div class="text-muted">{{ company.biography }}</div>
                    </div>
                </div>
            </div>
        </div>

        <h1 v-if="userSponsors.length">Users</h1>
        <div class="row">
            <div class="col-3" v-for="user in userSponsors">
                <div class="card">
                    <a v-bind:href="user.web_link">
                        <img class="card-img-top" v-bind:src="user.avatar_path" v-bind:alt="user.name">
                    </a>

                    <div class="card-body d-flex flex-column">
                        <h4>
                            <a v-bind:href="user.web_link">{{ user.name }}</a>
                        </h4>
                        <div class="text-muted">{{ user.biography }}</div>
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
                userSponsors: [],
                companySponsors: []
            }
        },

        mounted() {
            this.getUserSponsors();
            this.getCompanySponsors();
        },

        methods: {
            async getUserSponsors() {
                let self = this;
                await axios.get('/api/sponsors/users')
                    .then(function (response) {
                        self.userSponsors = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            async getCompanySponsors() {
                let self = this;
                await axios.get('/api/sponsors/companies')
                    .then(function (response) {
                        self.companySponsors = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    }
</script>

<style scoped>

</style>
