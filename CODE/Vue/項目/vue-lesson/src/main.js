import Vue from 'vue'
import App from './App.vue'
// 注册Announcement.vue
import Announcement from './Announcement.vue';
import Article from './Article.vue';

Vue.component("app-announcement", Announcement);
Vue.component("app-article", Article);
new Vue({
    el: '#app',
    render: h => h(App),
})