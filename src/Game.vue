<template>
  <div class="game">
    <div class="game__wrapper">
      <div class="game__trigger"></div>
      <div class="game__title">
        {{ title }}
      </div>
      <div class="game__date">
        {{ date }}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'game',
  props: ['title', 'date'],
  data () {
    return {
      msg: ''
    }
  }
}
</script>

<style scoped>
  .game {
    width: 80px;
    padding-top: 50px;
    padding-bottom: 80px;
    max-width: 90px;
    border-left: 1px solid rgba(255, 255, 255, .3);
    display: flex;
  }

  .game {
    align-items: flex-start;
  }
  .game.flex-center {
    align-items: center;
  }
  .game.flex-end {
    align-items: flex-end;
  }

  .game__trigger {
    width: 5px;
    height: 5px;
    background: #AC74D1;
    border-radius: 100%;
    margin-bottom: 20px;
    border: 2px solid #979797;
    box-shadow: 0 0 0 3px #fff, 0 0 2px 6px rgba(0,0,0,0.1), 0 0 0 7px rgba(255,255,255,0.4), 0 0 0 11px rgba(255,255,255,0.2);
  }

  .game__wrapper {
    margin-left: -3px;
  }

  .game__title {
    font-weight: 900;
    color: #fff;
    font-size: 3.2vh;
    margin-left: -6px;
    width: 230%;
    max-width: 200px;
  }

  .game__title:after {
    content: "";
    display: block;
    width: 30px;
    height: 5px;
    background: #fff;
    margin-top: 8%;
    margin-bottom: 8%;
  }

  .game__date {
    color: #fff;
    margin-left: -2.5%;
    width: 200%;
  }

</style>
