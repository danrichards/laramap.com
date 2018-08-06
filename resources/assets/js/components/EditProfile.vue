<template>
    <div>
        <form class="card">
            <div class="card-body">
                <h3 class="card-title">Edit Profile</h3>
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="name" v-model="user.name">
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="username" v-model="user.username">
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="form-label">Company</label>
                            <input type="text" class="form-control" placeholder="Company" name="company" v-model="user.company">
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" v-model="user.email">
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">City</label>
                            <input type="text" class="form-control" placeholder="City" name="city" v-model="user.city">
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Postal Code</label>
                            <input type="number" class="form-control" placeholder="ZIP Code" name="zip" v-model="user.zip">
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="form-label">Country</label>
                            <select class="form-control custom-select" v-model="user.country">
                                <option v-for="country in countries"  name="country" v-bind:value="country.name">{{ country.name }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label class="form-label">Available for hire</label>
                            <input type="checkbox" class="form-control" name="is_hireable" v-model="user.is_hireable">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-0">
                            <label class="form-label">About Me</label>
                            <textarea rows="5" class="form-control" placeholder="Here can be your biography" v-html="user.biography" v-model="user.biography"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary" v-on:click="updateAccount">Update Profile</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                countries: [],
                user: null
            }
        },

        mounted() {
            this.getUser();
            this.getCountries();
        },

        methods: {
            async getUser() {
                let self = this;
                await axios.get('/api/users/' + window.Laramap.currentUser.id)
                    .then(function (response) {
                        self.user = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            async getCountries() {
                let self = this;
                await axios.get('/api/countries')
                    .then(function (response) {
                        self.countries = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            async updateAccount(e) {
                e.preventDefault();
                await axios.patch('/api/users/' + window.Laramap.currentUser.id, this.user)
                    .then(function (response) {
                        toastr.success('Your profile has been updated', '✅')
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
