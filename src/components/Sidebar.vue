<template v-once>
  <div id="sidebar">
    <svg width="59px" height="60px" viewBox="30 39 59 60" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <defs>
            <polygon id="path-1" points="28.3593333 58.6380368 0 58.6380368 0 29.4086948 0 0.179352761 28.3593333 0.179352761 28.3593333 58.6380368"></polygon>
        </defs>
        <g id="Logo" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" transform="translate(30.000000, 39.000000)">
            <path d="M51.4281877,32.5160583 C51.412163,32.1689356 51.4285519,31.8167454 51.3757432,31.4754141 C50.6608235,26.8629172 45.5580519,25.5265491 42.4208543,27.6878313 C40.1275025,29.2674387 39.5629963,32.0509356 40.3474778,34.5173528 C41.352663,37.6776534 44.7189407,39.0299479 47.8029654,37.9588988 C49.9134901,37.2259233 51.5312556,35.143911 51.4281877,32.5160583 M44.8150889,58.8206472 L34.171416,58.8206472 L34.171416,0.362144172 L44.8150889,0.362144172 C45.2503049,0.428745399 45.6858852,0.49245092 46.1203728,0.562309816 C52.0739099,1.52042638 57.048484,6.13002761 58.4058481,11.9652362 C58.5832123,12.7282546 58.6837309,13.5086472 58.8195765,14.2807147 L58.8195765,44.9020767 C58.7543852,45.3230399 58.6939284,45.744727 58.6232741,46.1646043 C57.6162679,52.1630583 53.0980333,56.9923712 47.1452247,58.4087331 C46.3793173,58.5911626 45.5922864,58.685635 44.8150889,58.8206472" id="Fill-1" fill="#FFFFFF"></path>
            <g id="Group-5" transform="translate(0.000000, 0.182791)">
                <mask id="mask-2" fill="white">
                    <use xlink:href="#path-1"></use>
                </mask>
                <g id="Clip-4"></g>
                <path d="M23.3796605,4.78895399 C23.2678519,4.78171472 23.188821,4.77230368 23.1097901,4.77230368 C20.3910556,4.77157975 17.6719568,4.76470245 14.9532222,4.77447546 C12.8321358,4.78171472 10.8683827,5.35289264 9.13480247,6.57017485 C6.15384568,8.66304601 4.63477778,11.5554939 4.62712963,15.1794693 C4.60746296,24.6658006 4.62020988,34.1524939 4.62057407,43.6388252 C4.62093827,45.6187638 5.09512346,47.4738252 6.16877778,49.1504387 C8.0687963,52.1178129 10.7948148,53.8230215 14.3257099,53.994592 C17.2826296,54.1379294 20.2515679,54.0373037 23.2150432,54.0423712 C23.268216,54.0427331 23.3217531,54.0170337 23.3796605,54.0025552 L23.3796605,4.78895399 Z M0,44.7192853 L0,14.0979233 C0.0520802469,13.7330644 0.0968765432,13.3671196 0.157697531,13.0037086 C0.728030864,9.6052362 2.24527778,6.69939571 4.75896914,4.32093558 C6.54499383,2.63129141 8.62237654,1.42631595 11.0035,0.784193252 C11.9864691,0.519236196 13.0033086,0.377346626 14.0044877,0.179352761 L28.3593333,0.179352761 C28.3535062,0.317984663 28.3425802,0.456616564 28.3425802,0.595248466 C28.3418519,19.804273 28.3418519,39.0132975 28.3425802,58.2219601 C28.3425802,58.360592 28.3535062,58.4992239 28.3593333,58.6382178 L14.0044877,58.6382178 C13.9265494,58.6201196 13.8493395,58.6002117 13.7706728,58.5842853 C12.7356235,58.3736227 11.6652469,58.2679294 10.6706235,57.9367331 C5.41780247,56.1855552 2.01546914,52.6350583 0.496401235,47.3366411 C0.252753086,46.4863896 0.161703704,45.5927025 0,44.7192853 L0,44.7192853 Z" id="Fill-3" fill="#FFFFFF" mask="url(#mask-2)"></path>
            </g>
            <path d="M9.22006111,17.9581521 C9.21896852,14.8727779 11.4999377,12.5953055 14.5988944,12.5880663 C17.7160611,12.580827 20.0258019,14.8633669 20.0258019,17.9512748 C20.0258019,21.0449742 17.7248019,23.3275141 14.6061784,23.3271521 C11.515234,23.3267902 9.2211537,21.0402687 9.22006111,17.9581521" id="Fill-6" fill="#FFFFFF"></path>
        </g>
    </svg>

    <div class="filters">
      <div class="filters__button"  v-bind:class="[currentMarket == 'jp' ? 'active' : '']"  v-on:click="changeMarket('jp')">
        JP
      </div>
      <div class="filters__button"  v-bind:class="[currentMarket == 'na' ? 'active' : '']"  v-on:click="changeMarket('na')">
        NA
      </div>
      <div class="filters__button"  v-bind:class="[currentMarket == 'eu' ? 'active' : '']"  v-on:click="changeMarket('eu')">
        PAL
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'sidebar',
  data () {
    return {
      currentMarket: 'jp'
    }
  },
  mounted () {
    let that = this;
    this.animate()
    that.$root.$on('change-market', function(data){
      that.$data.currentMarket = data.market
    })
  },
  methods: {
    changeMarket: function (market) {
      this.$root.$emit('change-market-up', {
        market: market
      })
    },
    animate: function() {
      let _filters = document.querySelectorAll('.filters__button');
      TweenLite.to(_filters[0], .3, {
        x: 0,
        delay: 2
      })
      TweenLite.to(_filters[1], .3, {
        x: 0,
        delay: 2.2
      })
      TweenLite.to(_filters[2], .3, {
        x: 0,
        delay: 2.4
      })
    }
  }
}
</script>

<style lang="scss" scoped>

#sidebar {
  position: absolute;
  height: 100%;
  width: 80px;
  background: rgba(0,0,0,0.1);
  display: flex;
  justify-content: center;
  padding-top: 1.5%;
  box-sizing: border-box;
  background: linear-gradient(60deg, #ce0111 0%, #d93b41 100%);
  z-index: 9;
  border-right: 1px solid rgba(255, 255, 255, .3);
  svg {
    width: 60%;
  }
}

.filters {
  position: absolute;
  bottom: 3%;
  left: 0;
  width: 100%;
  &__button {
    opacity: .7;
    color: #fff;
    font-size: 16px;
    padding: 25% 0;
    text-align: center;
    cursor: pointer;
    position: relative;
    transform: translateX(-100%);
    &:hover {
      opacity: 1;
    }
    &.active {
      opacity: 1;
      &:after {
        content:"";
        display: block;
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 5px;
        background: #fff;
      }
    }
  }
}

</style>
