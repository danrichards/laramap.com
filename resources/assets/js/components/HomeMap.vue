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
                    center: [12.567380, 41.871940],
                    zoom: 2
                });

                map.scrollZoom.disable();

                let self = this;
                await axios.get('/api/users')
                    .then(function (response) {
                        self.users = response.data.data;
                        self.users.forEach(function(user) {
                            if (user.longitude) {
                                new window.mapboxgl.Marker()
                                    .setLngLat([user.longitude, user.latitude])
                                    .setPopup(new window.mapboxgl.Popup({ offset: 25 })
                                        .setHTML('<a href="/@' + user.username + '"><img class="avatar" src="' + user.avatar + '"></a>'))
                                    .addTo(map);
                            }
                        });
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
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
