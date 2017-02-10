<template>

  <div class="m-info" id="about">

    <a href="/#" id="close">
      <span></span>
    </a>

    <h1 class="m-info__title">
      <span>We</span>
      <span>just</span>
      <span>love</span>
      <span>Nintendo</span>
    </h1>

    <p class="m-info__details">
      <span>This</span>
      <span>site</span>
      <span>is</span>
      <span>an</span>
      <span>opensource</span>
      <span>project</span>
      <span>built</span>
      <span>with</span>
      <span>Vue.js</span>
      <span>and</span>
      <span>Laravel.</span>
      <br><br>
      <span>Developed</span>
      <span>by</span>
      <span><a href="#">Nic</a></span>
      <span>and</span>
      <span><a href="#">Eric</a>,</span>
      <span>designed</span>
      <span>by</span>
      <span><a href="#">Marco</a>.</span>
      <br><br><br>
      <span class="github-logo">
        <a href="https://github.com/nicholasruggeri/nintendo-switch-timeline">
          <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414"><path d="M8 0C3.58 0 0 3.582 0 8c0 3.535 2.292 6.533 5.47 7.59.4.075.547-.172.547-.385 0-.19-.007-.693-.01-1.36-2.226.483-2.695-1.073-2.695-1.073-.364-.924-.89-1.17-.89-1.17-.725-.496.056-.486.056-.486.803.056 1.225.824 1.225.824.714 1.223 1.873.87 2.33.665.072-.517.278-.87.507-1.07-1.777-.2-3.644-.888-3.644-3.953 0-.873.31-1.587.823-2.147-.09-.202-.36-1.015.07-2.117 0 0 .67-.215 2.2.82.64-.178 1.32-.266 2-.27.68.004 1.36.092 2 .27 1.52-1.035 2.19-.82 2.19-.82.43 1.102.16 1.915.08 2.117.51.56.82 1.274.82 2.147 0 3.073-1.87 3.75-3.65 3.947.28.24.54.73.54 1.48 0 1.07-.01 1.93-.01 2.19 0 .21.14.46.55.38C13.71 14.53 16 11.53 16 8c0-4.418-3.582-8-8-8"/></svg>
        </a>
      </span>
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

  .github-logo {
    display: block;
    margin-top: 30px;
    a {
      display: block;
      width: 30px;
      height: 30px;
    }
    svg {
      display: block;
      fill: #fff;
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

  #close {
    position: absolute;
    top: 5px;
    right: 5px;
    color: #fff;
    text-decoration: none;
    display: block;
    width: 40px;
    height: 40px;
    background: #000;
    &:hover {
      span {
        transform: scale(.7)
      }
    }
    span {
      display: block;
      width: 40px;
      height: 40px;
      background: #fff;
      &:after, &:before {
        content:"";
        display: block;
        width: 2px;
        height: 50%;
        background: #000;
        position: absolute;
        top: 50%;
        left: 50%;
      }
      &:after {
        transform: translate(-50%,-50%) rotate(45deg);
      }
      &:before {
        transform: translate(-50%,-50%) rotate(-45deg);
      }
    }
  }
</style>
