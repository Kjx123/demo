<template>
  <div>
        <mt-swipe :auto="4000">
            <mt-swipe-item class="slide1" v-for="(item,index) in lunboData" :key="index">
                <a :href="item.url">
                    <img class="img" :src="item.img" alt="">
                </a>
            </mt-swipe-item>
        </mt-swipe>
  </div>
</template>

<script>
export default {
  props:['lunboData']
}
</script>

<style>
    .img{
        width: 100%;
        height: 100%;  
    }
    .mint-swipe {
        height: 200px;
        color: #fff;
        font-size: 30px;
        text-align: center;
        margin-bottom: 20px;
      }

      .mint-swipe-item {
        line-height: 200px;
      }
</style>

