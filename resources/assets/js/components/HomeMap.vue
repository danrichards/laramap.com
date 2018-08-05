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
            async getUsers() {
                let map = new window.mapboxgl.Map({
                    container: 'map',
                    style: 'mapbox://styles/fwartner/ciralq1a4001bh1kp5yio8k2y',
                    center: [0, 0],
                    zoom: 2
                });

                let self = this;
                await axios.get('/api/users')
                    .then(function (response) {
                        self.users = response.data.data;
                        for (let item in response.data.data) {
                            let el = document.createElement('div');
                            el.className = 'marker';

                            self.placerMarkers(el, item);
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            placerMarkers(el, item) {
                new window.mapboxgl.Marker(el)
                    .setLngLat([item.latitude, item.longitude])
                    .setPopup(new window.mapboxgl.Popup({ offset: 25 })
                        .setHTML('<h3>' + user.name + '</h3><p>' + user.username + '</p>'))
                    .addTo(map);
            },

            mapLoaded(map) {

            }
        }
    }
</script>

<style scoped>
    .mapboxgl-popup {
        max-width: 200px;
    }

    .mapboxgl-popup-content {
        text-align: center;
        font-family: 'Open Sans', sans-serif;
    }
</style>
