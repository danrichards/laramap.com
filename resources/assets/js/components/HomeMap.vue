<template>
    <div>
        <mapbox
            access-token="pk.eyJ1IjoiZndhcnRuZXIiLCJhIjoiY2lyYWxwaDlmMDA0YWk5bWd2cjd1cHk1OCJ9.kzizG2lpFQU3tsuhfZBrGQ"
            :map-options="{
              style: 'mapbox://styles/fwartner/cjgrusaz600122sp5wqz54wb4',
              center: [-0, 0],
              zoom: 1
            }"
            :geolocate-control="{
              show: false,
              position: 'top-left'
            }"
            :scale-control="{
              show: false,
              position: 'top-left'
            }"
            :fullscreen-control="{
              show: true,
              position: 'top-left'
            }">
        </mapbox>
    </div>
</template>

<script>
    import Mapbox from 'mapbox-gl-vue';
    export default {
        components: {
            Mapbox
        },

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
                await axios.get('/api/public/users')
                    .then(function (response) {
                        self.users = response.data.data;
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
