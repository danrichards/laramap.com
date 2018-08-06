<template>
    <div>
        <div id="map"></div>
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

                        self.users.forEach(function(user) {
                            let marker = new window.mapboxgl.Marker()
                                .setLngLat({lng: user.longitude, lat: user.latitude})
                                .setPopup(new mapboxgl.Popup({ offset: 25 })
                                    .setHTML('<h3>' + user.username + '</h3><p>' + user.name + '</p>'))
                                .addTo(map);
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

    .marker {
        background-image: url('https://www.latlong.net/logo.png');
        background-size: cover;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        cursor: pointer;
    }
</style>
