<template>
    <div>
        <div class="card">
            <div class="card-status bg-blue"></div>
            <div class="card-header">
                <img class="avatar avatar-md mr-3" v-bind:src="thread.user.avatar">
                <div>
                    <a v-bind:href="'/@' + thread.user.username" class="text-default">
                                        <span v-if="! thread.user.name">
                                            {{ thread.user.username }}
                                        </span>

                        <span v-else>
                                            {{ thread.user.name }} <small class="text-muted">({{ thread.user.username }})</small>
                                        </span>
                    </a>
                    <small class="d-block text-muted">
                        <i class="fal fa-calendar-alt"></i> {{ thread.created_at.date | momentDate }} / <i class="fal fa-clock"></i> {{ thread.created_at.date | momentTime }}
                    </small>
                </div>
            </div>

            <div class="card-body d-flex flex-column">
                <h4>
                    {{ thread.title }}
                </h4>

                <article>{{ thread.body }}</article>
                    <div class="ml-auto text-muted">
                        <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fe fe-heart mr-1"></i></a>
                    </div>
                </div>
            <!--<span class="tag" v-for="user in thread.likers">-->
                    <!--<img class="tag-avatar avatar" v-bind:src="user.avatar">-->
                    <!--<a v-bind:href="'/@' + user.username">{{ user.username }}</a>-->
            <!--</span>-->
        </div>
    </div>
</template>

<script>
    export default {
        props: ['threadid'],

        data() {
            return {
                thread: {}
            }
        },

        mounted() {
            this.getThread();
        },

        filters: {
            momentDate(myDate) {
                return moment(myDate).format('DD.MM.YYYY');
            },

            momentFull(myDate) {
                return moment(myDate).format('DD.MM.YYYY HH:mm');
            },

            momentTime(myDate) {
                return moment(myDate).format('HH:mm');
            },
        },

        methods: {
            async getThread() {
                let self = this;
                await axios.get('/api/forums/threads/' + this.threadid)
                    .then(function (response) {
                        self.thread = response.data.data;
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
