<template>
  <div id="container">
    <div class="release-bg">
      <div class="release-container">
        <div class="release-month" v-for="month in months">
            <div class="release-month__name">
              {{ month.name }}
            </div>
            <div class="release-month__wrapper">
              <game v-for="game in month.games" :title="game.title" :date="game.date"></game>
            </div>
        </div>
      </div>
    </div>
    <div class="tba-bg">
      <div class="tba-container">
        <div class="release-tba__name">
          release date to be announced
        </div>
        <div class="release-tba" v-for="month in months">
            <div class="release-tba__wrapper">
              <game v-for="game in month.games" :title="game.title"></game>
            </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'container',
  data () {
    return {
      months: releases.jp
    }
  },
  methods: {
    setHeightScroller: function() {
      let _d = document,
          _container = _d.querySelector('#container'),
          _scroller  = _d.querySelector('.scroller');
      _scroller.style.height = _container.offsetWidth + 'px';
    },
    setGameAlignment: function() {
      let _d       = document,
        _games     = _d.querySelectorAll('.game');

      Array.prototype.forEach.call(_games, function(el, i){
        if (i % 3 === 2) el.classList.add('flex-end')
        if (i % 3 === 1) el.classList.add('flex-center')
        el.querySelector('.game__wrapper').classList.add('is-visible')
      });
    },
    renderBlock: function() {
      let _d       = document,
        _container = _d.querySelector('#container'),
        ticking    = false;

      let update = () => {
        let X = (_container.offsetWidth - window.innerWidth) * (_d.body.scrollTop / (container.offsetWidth - window.innerHeight));
        TweenLite.set(container, {x: -X})
        ticking = false;
      }

      let requestTick = () => {
        if (!ticking) {
          window.requestAnimationFrame(update);
          ticking = true;
        }
      }

      let onScroll = function() {
        requestTick();
      }

      window.onscroll = () => {
        onScroll()
      }

    }
  },
  watch: {
    months: function (val, oldVal) {
      console.log('new: %s, old: %s', val, oldVal)
    },
  },
  mounted () {
    let that = this;
    this.renderBlock()
    that.setHeightScroller()
    that.setGameAlignment()
    that.$root.$on('change-market', function(data){
      that.$data.months = releases[data.market]
      that.renderBlock()
      setTimeout(function(){
        that.setHeightScroller()
        that.setGameAlignment()
      }, 0)
    })
  }
}
</script>

<style lang="scss" scoped>

#container {
  will-change: transform;
  flex-grow: 1;
  padding-left: 80px;
  position: absolute;
  z-index: 1;
  transform: translateZ(0);
  backface-visibility: hidden;
  top: 0;
  left: 0;
  display: flex;
  flex-direction: row;
  height: 100%;
  display: table;
}

.release-bg, .tba-bg {
  padding-left: 80px;
  padding-right: 80px;
  display: table-cell;
}

.release-bg {
  background: linear-gradient(60deg, #ce0111 0%, rgba(252,125,123,1) 100%);
}

.tba-bg {
  background: linear-gradient(60deg, #191919 0%, #383636 100%);
}

.release-container, .tba-container {
  position: relative;
  display: flex;
  height: 100%;
  border-right: 1px solid rgba(255, 255, 255, .3);
  // display: table;
}

.release-month, .release-tba {
  // display: table-cell;
  // vertical-align: top;
  display: inline-block;
  float: left;
  height: 100%;
  position: relative;
  // display: flex;
  margin-right: 80px;
  border-right: 1px solid rgba(255, 255, 255, .3);
  &:after {
    content:"";
    display: block;
    width: calc(100% - 80px);
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.08);
    opacity: 1;
    transition: opacity .5s ease-out;
    position: absolute;
    top: 0;
    left: 0;
    pointer-events: none;
  }
}

.release-month__wrapper, .release-tba__wrapper {
  display: flex;
  height: 100%;
}

.release-month__name, .release-tba__name {
  position: absolute;
  bottom: 2%;
  left: 0;
  width: calc(100% - 80px);
  width: 100%;
  font-size: 14px;
  color: #fff;
  border-top: 2px solid #fff;
  padding-top: 10px;
  padding-left: 10px;
  text-transform: uppercase;
  letter-spacing: 1px;
}

.release-tba__name {
  width: calc(100% - 80px);
}

</style>
