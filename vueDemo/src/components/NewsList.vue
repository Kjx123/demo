<template>
  <div class="temp">
      <ul class="mui-table-view">
				<li v-for="(item,index) in newslistData" :key="index" class="mui-table-view-cell mui-media">
					<router-link v-bind='{to:"/newsdetail/"+item.id}'>
						<img class="mui-media-object mui-pull-left" :src="item.img_url">
						<div class="mui-media-body">
							{{item.title}}
							<!-- <p class='mui-ellipsis'>{{item.zhaiyao}}</p> -->
                             <p class='mui-ellipsis'>发布时间:{{item.add_time | filter('YYYY-MM-DD hh:mm:ss')}}  <span>点击量: {{item.click}}</span>   </p>
                        </div>
					</router-link>
				</li>
			</ul>
  </div>
</template>

<script>
import tool from "../tool/tool";
export default {
  data() {
    return {
      newslistData: []
    };
  },
  created() {
    this.getNewsListData();
  },
  methods: {
    getNewsListData() {
      // var url = 'http://vue.studyit.io/api/getnewslist'
      var url = `${tool.HTTP}${tool.SERVER_PATH}/api/getnewslist`;
      this.$http.get(url).then(
        res => {
          // console.log(res)
          this.newslistData = res.body.message;
        },
        res => {
          console.log("页面信息请求失败！！！");
        }
      );
    }
  }
};
</script>

<style>

</style>
