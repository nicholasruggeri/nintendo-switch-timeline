<template>
  <div id="container">

    <div class="release-month" v-for="month in months">
        <div class="release-month__name">
          {{ month.name }}
        </div>
        <div class="release-month__wrapper">
          <game v-for="game in month.games" :title="game.title" :date="game.date"></game>
        </div>
    </div>
  </div>
</template>

<script>

export default {
  name: 'container',
  data () {
    return {
      months: [
        {
          name: 'Marzo',
          games : [
            {
              title: "The Legend of Zelda: Breath of the Wild",
              date: "3 Marzo 2017"
            },
            {
              title: "Skylanders: Imaginators",
              date: "3 Marzo 2017"
            },
            {
              title: "Super Bomberman R",
              date: "3 Marzo 2017"
            },
            {
              title: "Showel Knight",
              date: "3 Marzo 2017"
            },
            {
              title: "The Legend of Zelda: Breath of the Wild",
              date: "3 Marzo 2017"
            },
            {
              title: "Skylanders: Imaginators",
              date: "3 Marzo 2017"
            },
            {
              title: "Super Bomberman R",
              date: "3 Marzo 2017"
            },
            {
              title: "Showel Knight",
              date: "3 Marzo 2017"
            }
          ]
        },
        {
          name: 'Aprile',
          games : [
            {
              title: "The Legend of Zelda: Breath of the Wild",
              date: "3 Marzo 2017"
            },
            {
              title: "Skylanders: Imaginators",
              date: "3 Marzo 2017"
            },
            {
              title: "Super Bomberman R",
              date: "3 Marzo 2017"
            },
            {
              title: "Showel Knight",
              date: "3 Marzo 2017"
            }
          ]
        },
        {
          name: 'Maggio',
          games : [
            {
              title: "The Legend of Zelda: Breath of the Wild",
              date: "3 Marzo 2017"
            },
            {
              title: "Skylanders: Imaginators",
              date: "3 Marzo 2017"
            },
            {
              title: "Super Bomberman R",
              date: "3 Marzo 2017"
            },
            {
              title: "Showel Knight",
              date: "3 Marzo 2017"
            }
          ]
        },
        {
          name: 'Giugno',
          games : [
            {
              title: "The Legend of Zelda: Breath of the Wild",
              date: "3 Marzo 2017"
            },
            {
              title: "Skylanders: Imaginators",
              date: "3 Marzo 2017"
            },
            {
              title: "Super Bomberman R",
              date: "3 Marzo 2017"
            },
            {
              title: "Showel Knight",
              date: "3 Marzo 2017"
            }
          ]
        },
      ]
    }
  },
  mounted () {
    var animationCtrl = new ScrollMagic.Controller();
    var _d = document;
    var _body = _d.querySelector('body');
    var _container = _d.querySelector('#container');
    var _games = document.querySelectorAll('.game');

    _body.style.height = _container.offsetWidth + 'px';

    new ScrollMagic.Scene({
      triggerElement: _body,
      duration: _container.offsetWidth,
      triggerHook: 'onLeave'
    })
    .setTween(_container, {
        x: window.innerWidth - _container.offsetWidth*1.1
    })
    .addTo(animationCtrl);

    Array.prototype.forEach.call(_games, function(el, i){
      if (i % 3 === 2) el.classList.add('flex-end')
      if (i % 3 === 1) el.classList.add('flex-center')
    });

  }
}
</script>

<style scoped>

#container {
  will-change: transform;
  flex-grow: 1;
  padding-left: 160px;
  position: absolute;
  top: 0;
  left: 0;
  display: flex;
  flex-direction: row;
  height: 100%;
}

.release-month {
  position: relative;
  display: flex;
  margin-right: 80px;
  border-right: 1px solid rgba(255, 255, 255, .3);
}

.release-month:after {
  content:"";
  display: block;
  width: calc(100% - 80px);
  height: 100%;
  background: rgba(0,0,0,0.08);
  opacity: 0;
  transition: opacity .5s ease-out;
  position: absolute;
  top: 0;
  left: 0;
  pointer-events: none;
}

.release-month:hover:after {
  opacity: 1;
}

.release-month__wrapper {
  display: flex;
}

.release-month__name {
  position: absolute;
  bottom: 2%;
  left: 0;
  width: calc(100% - 80px);
  font-size: 14px;
  color: #fff;
  border-top: 2px solid #fff;
  padding-top: 10px;
}

</style>
