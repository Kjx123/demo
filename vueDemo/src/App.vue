<template>
    <div>
        <!-- 1.导航部分 -->
		<!-- 从mint-ui导入的导航条navbar -->
        <mt-header fixed title="Vue项目"></mt-header>

        <!-- 2.中间各个组件之间的切换部分 -->
		<router-view></router-view>

        <!-- 3.tabbar -->
		<!-- 从mui导入样式库 -->
        <nav class="mui-bar mui-bar-tab">
			<router-link class="mui-tab-item" to="/home">
				<span class="mui-icon mui-icon-home"></span>
				<span class="mui-tab-label">首页</span>
			</router-link>
			<router-link class="mui-tab-item" to="/member">
				<span class="mui-icon mui-icon-email"></span>
				<span class="mui-tab-label">会员</span>
			</router-link>
			<router-link class="mui-tab-item" to="/shopcar">
				<span class="mui-icon mui-icon-contact">
                    <span class="mui-badge">0</span>
                </span>
				<span class="mui-tab-label">购物车</span>
			</router-link>
			<router-link class="mui-tab-item" to="/search">
				<span class="mui-icon mui-icon-gear"></span>
				<span class="mui-tab-label">搜索</span>
			</router-link>
		</nav>
    </div>
</template>

<script>
export default {
  
}
</script>

<style>

</style>
