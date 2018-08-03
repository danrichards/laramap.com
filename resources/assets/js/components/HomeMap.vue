<template>
    <div>
        <div id="map"></div>
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
            createMap() {
                var map = new window.mapboxgl.Map({
                    container: 'map',
                    style: 'mapbox://styles/fwartner/cjgrusaz600122sp5wqz54wb4',
                    center: [0, 0],
                    zoom: 1,
                });

                for (user in this.users) {
                    var marker = new mapboxgl.Marker()
                        .setLngLat([user.latitude, user.longitude])
                        .addTo(map);
                }
            },

            async getUsers() {
                let self = this;
                await axios.get('/api/users')
                    .then(function (response) {
                        self.users = response.data.data;
                        self.createMap();
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
