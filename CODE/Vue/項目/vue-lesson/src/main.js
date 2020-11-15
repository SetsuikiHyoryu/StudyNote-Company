import Vue from 'vue'
import App from './App.vue'
// 注册Announcement.vue
import Announcement from './alert/Announcement.vue';
import Article from './article/Article.vue';

Vue.component("app-announcement", Announcement);
Vue.component("app-article", Article);
new Vue({
    el: '#app',
    render: h => h(App),
})