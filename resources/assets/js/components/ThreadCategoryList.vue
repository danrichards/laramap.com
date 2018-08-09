<template>
    <div class="my-3 my-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-secondary btn-block" data-toggle="modal" data-target="#newThreadModal">Start new Thread</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card" v-for="thread in threads">
                        <div class="card-status bg-blue"></div>
                        <div class="card-body d-flex flex-column">
                            <h4><a v-bind:href="'/forums/threads/' + thread.slug">{{ thread.title }}</a></h4>
                            <div class="text-muted">{{ thread.body }}</div>
                            <div class="d-flex align-items-center pt-5 mt-auto">
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
                                <div class="ml-auto text-muted">
                                    <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fe fe-heart mr-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="newThreadModal" tabindex="-1" role="dialog" aria-labelledby="newThreadModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newThreadModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="form-group">
                                <div class="row align-items-center">
                                    <label class="col-sm-2">To:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row align-items-center">
                                    <label class="col-sm-2">Subject:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <textarea rows="10" class="form-control"></textarea>
                            <div class="btn-list mt-4 text-right">
                                <button type="button" class="btn btn-secondary btn-space">Cancel</button>
                                <button type="submit" class="btn btn-primary btn-space">Send message</button>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['categoryid'],

        data() {
            return {
                threads: [],
            }
        },

        mounted() {
            this.getThreads();
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
            moment() {
                return window.moment;
            },

            async getThreads() {
                let self = this;
                await axios.get('/api/forums/threads', {
                    params: {
                        category_id: self.categoryid
                    }
                })
                    .then(function (response) {
                        self.threads = response.data.data;
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
