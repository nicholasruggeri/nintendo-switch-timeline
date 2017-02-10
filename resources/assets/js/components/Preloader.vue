<template>
  <div id="preloader">
    <div class="switch">
      <div class="switch__left"></div>
      <div class="switch__right"></div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'preloader',
  mounted () {
    const _l = preloader.querySelector('.switch__left');
    const _r = preloader.querySelector('.switch__right');
    const tl = new TimelineLite({ paused: false });

    tl.to(_r, .4, {
        y: '-60%'
    })
    tl.to(_r, .1, {
        y: '5%'
    })
    tl.to(_l, .1, {
        y: '5%'
    }, "-=.1")
    tl.to(_r, .1, {
        y: '0%'
    })
    tl.to(_l, .1, {
        y: '0%'
    }, "-=.1")

  }
}
</script>

<style lang="scss" scoped>

$red: #e60012;
$white: #fff;

#preloader {
  width: 100%;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 99;
  background: linear-gradient(60deg, #ce0111 0%, #d93b41 100%);
}

.switch {
  position: absolute;
  width: 191px;
  height: 191px;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  &__left, &__right {
    position: absolute;
    background: $white;
    height: 100%;
  }
  &__left {
    width: 48.4%;
    top: 0;
    left: 0;
    border-radius: 3.1em 0 0 3.1em;
    // animation: pulse2 .7s forwards;
    &:before {
      content: "";
      display: block;
      position: absolute;
      width: 66%;
      height: 84%;
      background: $red;
      top: 8%;
      right: 17%;
      border-radius: 2.1em 0 0 2.1em
    }
    &:after {
      content: "";
      display: block;
      background: $white;
      position: absolute;
      top: 21%;
      left: 33%;
      width: 38%;
      height: 18.5%;
      border-radius: 100%;
    }
  }
  &__right {
    width: 41.7%;
    top: 0;
    right: 0;
    border-radius:  0 3.1em 3.1em 0;
    transform: translateY(-50%);
    // animation: pulse .7s forwards;
    &:after {
      content: "";
      display: block;
      background: $red;
      position: absolute;
      top: 45%;
      left: 24%;
      width: 47%;
      height: 19.7%;
      border-radius: 100%;
    }
  }
}

@keyframes pulse {
  0% {
    transform: translateY(-50%);
  }
  5% {
    transform: translateY(-60%);
  }
  98% {
    transform: translateY(5%);
  }
  100% {
    transform: translateY(0%);
  }
}

@keyframes pulse2 {
  0% {
    transform: translateY(0%);
  }
  80% {
    transform: translateY(0%);
  }
  98% {
    transform: translateY(5%);
  }
  100% {
    transform: translateY(0%);
  }
}

</style>
