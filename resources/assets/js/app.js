
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


window.Vue = require('vue');
require('./bootstrap');

import VuePrism from 'vue-prism';
Vue.use(VuePrism);
import 'prismjs/themes/prism.css';

import Turbolinks from 'turbolinks';
Turbolinks.start();

import Highlight from './extra/Highlight';
document.addEventListener('turbolinks:load', () => {
    Highlight.start();
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);


Vue.component('home-map', require('./components/HomeMap.vue'));
Vue.component('user-list', require('./components/UserList.vue'));
Vue.component('user-latest', require('./components/LatestUsers.vue'));
Vue.component('user-avatar-stack', require('./components/UserAvatarStack.vue'));
Vue.component('user-avatar-list', require('./components/UserAvatarList.vue'));
Vue.component('user-profile', require('./components/UserProfile.vue'));
Vue.component('user-edit', require('./components/EditProfile.vue'));
Vue.component('user-notifications-bar', require('./components/NotificationsBar.vue'));

Vue.component('thread-list', require('./components/ThreadList.vue'));
Vue.component('thread-category-list', require('./components/ThreadCategoryList.vue'));
Vue.component('single-thread', require('./components/SingleThread.vue'));

if (window.Notification) {
    console.log('Notifications are supported!');
} else {
    alert('Notifications aren\'t supported on your browser! :(');
}

import InstantSearch from 'vue-instantsearch';
Vue.use(InstantSearch);

const app = new Vue({
    el: '#app',
    mounted() {
        this.listenForChanges();
    },
    data() {
        return {
            isLoading: false,
            userId: window.Laramap.currentUser.id,
            currentUser: window.Laramap.currentUser,
            isLoggedIn: window.Laramap.authCheck
        }
    },
    methods: {
        listenForChanges() {
            let self = this;
            console.log('Current User ID:' + this.userId);
            Echo.channel('private-App.Models.User.' + this.userId)
                .notification((notification) => {
                    console.log('hghjhfhf');
                });

            Echo.channel('posts')
                .listen('PostPublished', post => {
                    if (! ('Notification' in window)) {
                        console.log('Web Notifications are not supported on your browser');
                        return;
                    }

                    Notification.requestPermission( permission => {
                        let notification = new Notification('New post published', {
                            body: post.title,
                            icon: "https://laramap.com/images/logo_500x500.png"
                        });

                        notification.onclick = () => {
                            window.open(window.location.href);
                        };
                    });
                })
        }
    }
});
