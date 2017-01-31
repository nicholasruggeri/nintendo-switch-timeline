import Vue from 'vue'
import App from './App.vue'
import Sidebar from './components/Sidebar.vue'
import Container from './Container.vue'
import Game from './components/Game.vue'
import Preloader from './components/Preloader.vue'
import Info from './components/Info.vue'

Vue.component('sidebar', Sidebar)
Vue.component('container', Container)
Vue.component('game', Game)
Vue.component('preloader', Preloader)
Vue.component('info', Info)


const vm = new Vue({
  el: '#app',
  render: h => h(App),
  mounted() {
    this.$on('change-market-up', (data) => {
      this.$emit('change-market', data)
    });
  },
})
