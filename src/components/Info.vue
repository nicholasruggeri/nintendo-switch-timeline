<template>
  <div class="m-info" id="about">
    <h1 class="m-info__title">
      <span>We</span> <span>just</span> <span>love</span><br>
      <span>Nintendo</span>
    </h1>

    <p class="m-info__details">
      <span>Developed</span> <span>by</span> <span><a href="#">Nic</a></span> <span>and</span> <span><a href="#">Eric</a></span><br>
      <span>Designed</span> <span>by</span> <span><a href="#">Marco</a></span><br><br>

      <span>Built</span> <span>with</span> <span><a href="#">Vue.js</a></span> <span>and</span> <span><a href="#">Laravel</a></span><br>
      <span>Data</span> <span>"stolen"</span> <span>from</span> <span><a href="#">Wikipedia</a></span>
    </p>
  </div>
</template>

<script>
export default {
  name: 'info'
}
</script>

<style lang="scss" scoped>

  $ease: cubic-bezier(0.785, 0.135, 0.150, 0.860);

  #about {
    pointer-events: none;
    opacity: 0;
    transition: opacity .3s $ease;
    span {
      opacity: 0;
      transform: translateY(30px);
      display: inline-block;
    }
    &:target {
      opacity: 1;
      pointer-events: visible;
      span {
        opacity: 1;
        transform: translateY(0px);
        transition-delay: 0s;
      }
      @for $i from 1 to 40 {
        span:nth-child(#{$i}) {
          transition: all 1s $ease;
          transition-delay: $i * .1s;
        }
      }
    }
  }

  .m-info {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 999;
    background: rgba(0,0,0,0.95);
    padding: 5vw;
    color: #fff;
    font-size: 5vw;
    display: flex;
    align-items: flex-start;
    flex-direction: column;
    justify-content: center;
    &__title {
      margin: 0;
      line-height: 1;
    }
    &__details {
      margin-top: 100px;
      font-size: 16px;
      a {
        color: inherit;
      }
    }
  }
</style>
