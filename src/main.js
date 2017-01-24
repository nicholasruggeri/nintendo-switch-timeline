import Vue from 'vue'
import App from './App.vue'
import Sidebar from './Sidebar.vue'
import Container from './Container.vue'
import Game from './Game.vue'

Vue.component('sidebar', Sidebar)
Vue.component('container', Container)
Vue.component('game', Game)

new Vue({
  el: '#app',
  render: h => h(App)
})
