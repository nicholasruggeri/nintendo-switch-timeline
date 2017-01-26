<template>
  <div id="app">
    <preloader></preloader>
    <sidebar></sidebar>
    <container v-if="isPreloaded"></container>
  </div>
</template>

<script>
export default {
  name: 'app',
  data() {
    return {
      isPreloaded: false
    }
  },
  mounted () {
    window.onload = () => {
      setTimeout(() => {
        this.isPreloaded = true;
        TweenLite.to(preloader, 1,{
          opacity: 0,
          display: 'none',
          ease: Expo.easeInOut
        })
      }, 1000)
    }
  }
}
</script>

<style lang="scss" scoped>
  #app {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }
</style>
