<template>
    <div class="temp">
        <!-- 应该从lunbo.vue中引入图片轮播组件进行展示 -->
        <Lunbo :lunboData="homeData"></Lunbo>
        <!-- 从mui中导入九宫格样式 -->
        <div class="mui-content">
		        <ul class="mui-table-view mui-grid-view mui-grid-9">
		            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
                        <router-link to="/newslist">
		                    <span class="mui-icon mui-icon-home"></span>
		                    <div class="mui-media-body">新闻列表</div>
                        </router-link>
                     </li>
		            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
                  <router-link to="/photolist">
		                <span class="mui-icon mui-icon-email">
                      <span class="mui-badge">5</span>
                    </span>
		                <div class="mui-media-body">图片分享</div>
                  </router-link>
                </li>
		            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="#">
		                    <span class="mui-icon mui-icon-chatbubble"></span>
		                    <div class="mui-media-body">Chat</div></a></li>
		            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="#">
		                    <span class="mui-icon mui-icon-location"></span>
		                    <div class="mui-media-body">location</div></a></li>
		            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="#">
		                    <span class="mui-icon mui-icon-search"></span>
		                    <div class="mui-media-body">Search</div></a></li>
		            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="#">
		                    <span class="mui-icon mui-icon-phone"></span>
		                    <div class="mui-media-body">Phone</div></a></li>
		            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="#">
		                    <span class="mui-icon mui-icon-gear"></span>
		                    <div class="mui-media-body">Setting</div></a></li>
		            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="#">
		                    <span class="mui-icon mui-icon-info"></span>
		                    <div class="mui-media-body">about</div></a></li>
		           <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="#">
		                    <span class="mui-icon mui-icon-more"></span>
		                    <div class="mui-media-body">more</div></a></li>
		        </ul> 
		</div>
    </div>
    </div>
</template>

<script>
import Lunbo from "./sub/Lunbo.vue";
import tool from "../tool/tool";
export default {
  data() {
    return {
      homeData: []
    };
  },
  components: {
    Lunbo
  },
  created() {
    this.getHomeData();
  },
  methods: {
    // 封装了一个请求方法
    getHomeData() {
      // 发起请求
      // var url = 'http://vue.studyit.io/api/getlunbo'
      var url = `${tool.HTTP}${tool.SERVER_PATH}/api/getlunbo`;
      this.$http.get(url).then(
        res => {
          //    console.log(res)
          this.homeData = res.body.message;
        },
        res => {
          console.log("home页面请求图片轮播数据出错");
        }
        // function (response) {

        // },
        // function (response) {

        // }
      );
    }
  }
};
</script>

<style scoped>
.mui-icon-home {
  background-image: url("../images/callme.png");
  background-repeat: round;
}
.mui-icon-home:before {
  content: "";
}
.mui-icon {
  width: 45px;
  height: 45px;
}
.mui-grid-view.mui-grid-9 {
  background-color: white;
}
</style>
