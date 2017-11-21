<template>
  <div class="temp">
      <div class="title">
          <h3>{{newsDetailData.title}}</h3>
          <div class="info">
              {{newsDetailData.add_temp | filter('YYYY-MM-DD')}}
              <div>
                  {{newsDetailData.click}}浏览
                    分类：经济民生
              </div>
          </div>
          <div class="content">
              <p v-html="newsDetailData.content"></p>
          </div>
      </div>
  </div>
</template>

<style scoped>
    .content {
        padding: 10px;
    }
    .info {
        display: flex;
        justify-content: space-between;
    }
</style>



<script>
import tool from "../tool/tool";
export default {
  data() {
    return {
      newsDetailData: {}
    };
  },
  created() {
    var id = this.$route.params.id;
    this.getNewsDetailData(id);
  },
  methods: {
    getNewsDetailData(id) {
      //请求当前页面数据
      var url = `${tool.HTTP}${tool.SERVER_PATH}/api/getnew/${id}`;
      this.$http.get(url).then(
        res => {
          this.newsDetailData = res.body.message[0];
        },
        res => {
          console.log("请求失败！！！");
        }
      );
    }
  }
};
</script>



