<template>
    <div class="my-3 my-md-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-profile">
                        <div class="card-header" v-bind:style="'background-image: url('+ mapLink + ');'"></div>
                        <div class="card-body text-center">
                            <img class="card-profile-img" v-bind:src="avatar">
                            <h3 class="mb-3">{{ user.name }}</h3>

                            <p class="mb-4">
                                {{ user.biography }}
                            </p>

                            <button class="btn btn-outline-primary btn-sm" v-if="user.web_link">
                                <i class="fas fa-globe"></i>
                            </button>

                            <button class="btn btn-outline-primary btn-sm" v-if="user.twitter_link">
                                <i class="fab fa-twitter"></i>
                            </button>

                            <button class="btn btn-outline-primary btn-sm" v-if="user.github_link">
                                <i class="fab fa-github"></i>
                            </button>

                            <button class="btn btn-outline-primary btn-sm" v-if="user.linkedin_link">
                                <i class="fab fa-linkedin"></i>
                            </button>

                            <button class="btn btn-outline-primary btn-sm" v-if="user.facebook_link">
                                <i class="fab fa-facebook"></i>
                            </button>

                            <div v-if="user.is_sponsor || user.is_admin">
                                <br>

                                <small v-if="user.is_admin">
                                    <i class="fas fa-user-shield"></i> Administrator
                                </small>

                                <small v-if="user.is_sponsor">
                                    <i class="fas fa-star sponsor"></i> Sponsor
                                </small>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <img class="avatar avatar-xxl mr-5" v-bind:src="avatar" v-bind:alt="user.username">
                                <div class="media-body">
                                    <h4 class="m-0">Juan Hernandez</h4>
                                    <p class="text-muted mb-0">Webdeveloper</p>
                                    <ul class="social-links list-inline mb-0 mt-2" hngkcbu="" hidden="">
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" title="" data-toggle="tooltip" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" title="" data-toggle="tooltip" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" title="" data-toggle="tooltip" data-original-title="1234567890"><i class="fa fa-phone"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" title="" data-toggle="tooltip" data-original-title="@skypename"><i class="fa fa-skype"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Message">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-secondary">
                                        <i class="fe fe-camera"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <ul class="list-group card-list-group">
                            <li class="list-group-item py-5">
                                <div class="media">
                                    <div class="media-object avatar avatar-md mr-4" style="background-image: url(demo/faces/male/16.jpg)"></div>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <small class="float-right text-muted">4 min</small>
                                            <h5>Peter Richards</h5>
                                        </div>
                                        <div>
                                            Aenean lacinia bibendum nulla sed consectetur. Vestibulum id ligula porta felis euismod semper. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras
                                            justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Cum sociis natoque penatibus et magnis dis parturient montes,
                                            nascetur ridiculus mus.
                                        </div>
                                        <ul class="media-list">
                                            <li class="media mt-4">
                                                <div class="media-object avatar mr-4" style="background-image: url(demo/faces/female/17.jpg)"></div>
                                                <div class="media-body">
                                                    <strong>Debra Beck: </strong>
                                                    Donec id elit non mi porta gravida at eget metus. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus
                                                    auctor fringilla. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Sed posuere consectetur est at lobortis.
                                                </div>
                                            </li>
                                            <li class="media mt-4">
                                                <div class="media-object avatar mr-4" style="background-image: url(demo/faces/male/32.jpg)"></div>
                                                <div class="media-body">
                                                    <strong>Jack Ruiz: </strong>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit
                                                    amet risus.
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item py-5">
                                <div class="media">
                                    <div class="media-object avatar avatar-md mr-4" style="background-image: url(demo/faces/male/16.jpg)"></div>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <small class="float-right text-muted">12 min</small>
                                            <h5>Peter Richards</h5>
                                        </div>
                                        <div>
                                            Donec id elit non mi porta gravida at eget metus. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cum sociis natoque penatibus et magnis dis
                                            parturient montes, nascetur ridiculus mus. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item py-5">
                                <div class="media">
                                    <div class="media-object avatar avatar-md mr-4" style="background-image: url(demo/faces/male/16.jpg)"></div>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <small class="float-right text-muted">34 min</small>
                                            <h5>Peter Richards</h5>
                                        </div>
                                        <div>
                                            Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Aenean eu leo quam. Pellentesque ornare sem lacinia quam
                                            venenatis vestibulum. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                        </div>
                                        <ul class="media-list">
                                            <li class="media mt-4">
                                                <div class="media-object avatar mr-4" style="background-image: url(demo/faces/male/26.jpg)"></div>
                                                <div class="media-body">
                                                    <strong>Wayne Holland: </strong>
                                                    Donec id elit non mi porta gravida at eget metus. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus
                                                    auctor fringilla. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Sed posuere consectetur est at lobortis.
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>


                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['userid'],

        data() {
            return {
                user: {},
                mapLink: null,
                avatar: null
            }
        },

        mounted() {
            this.getUser();
        },

        methods: {
            getUser() {
                let self = this;
                axios.get('/api/users/' + this.userid)
                    .then(function (response) {
                        self.user = response.data.data;
                        self.getAvatar();
                        self.mapLink = 'https://maps.googleapis.com/maps/api/staticmap?center=' + response.data.data.latitude + ',' + response.data.data.longitude + '&zoom=13&scale=false&size=600x300&maptype=roadmap&key=' + window.Laramap.gmaps_key + '&format=png&visual_refresh=true';
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            getAvatar() {
                if (this.user.avatar_path) {
                    this.avatar = this.user.avatar_path
                } else {
                    this.avatar = this.user.gravatar
                }
            }
        }
    }
</script>

<style scoped>
    .sponsor {
        color: #FFD700;
    }
</style>
