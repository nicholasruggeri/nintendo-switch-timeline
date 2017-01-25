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
  props: ['title', 'date']
}
</script>

<style lang="scss" scoped>

  $ease: cubic-bezier(0.785, 0.135, 0.150, 0.860);

  .game {
    width: 80px;
    padding-top: 50px;
    padding-bottom: 80px;
    border-left: 1px solid rgba(255, 255, 255, .3);
    display: flex;
    align-items: flex-start;
    position: relative;
    cursor: pointer;
    &:after {
      content:"";
      display: block;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      position: absolute;
      background: rgba(0,0,0,0.1);
      opacity: 0;
    }
    &:hover:after {
      opacity: .5;
    }
    &:hover {
      .game__wrapper .game__trigger {
        transform: scale(1.5);
      }
    }
    &.flex-center {
      align-items: center;
    }
    &.flex-end {
      align-items: flex-end;
    }
  }

  .game__trigger {
    width: 5px;
    height: 5px;
    background: #AC74D1;
    border-radius: 100%;
    margin-bottom: 20px;
    border: 2px solid #979797;
    box-shadow: 0 0 0 3px #fff, 0 0 2px 6px rgba(0,0,0,0.1),
                0 0 0 7px rgba(255,255,255,0.4),
                0 0 0 11px rgba(255,255,255,0.2);
    transform: scale(0);
    will-change: transform;
    transition: transform 1s $ease;
  }

  .game__wrapper {
    margin-left: -3px;
    &.is-visible {
      .game__trigger {
        transform: scale(1);
      }
      .game__title {
        transform: translateX(0px);
        opacity: 1;
      }
      .game__date {
        transform: translateX(0px);
        opacity: 1;
      }
    }
  }

  .game__title {
    font-weight: 900;
    color: #fff;
    font-size: 3.2vh;
    margin-left: -6px;
    width: 230%;
    max-width: 200px;
    transform: translateX(-10px);
    opacity: 0;
    will-change: transform, opacity;
    transition: all 1s $ease;
    &:after {
      content: "";
      display: block;
      width: 30px;
      height: 5px;
      background: #fff;
      margin-top: 8%;
      margin-bottom: 8%;
    }
  }

  .game__date {
    color: #fff;
    margin-left: -3px;
    width: 200%;
    transform: translateX(-10px);
    opacity: 0;
    will-change: transform, opacity;
    transition: all 1s $ease;
    transition-delay: 0.2s;
  }

</style>
