<template>
    <div class="temp">
        <div class="menu">
            <ul>
                <li><a @click="getImageData(0)">全部</a></li>
                <li v-for="(item,index) in newlistData" :key="index">
                    <a @click="getImageData(item.id)">{{item.title}}</a>
                </li>
            </ul>
        </div>
        <div class="image" v-for="(item,index) in imagesData" :key="index">
            <img :src="item.img_url" alt="">
            <div class="zhaiyao">
                <p>{{item.zhaiyao}}</p>
            </div>
        </div>
    </div>
</template>

<style>
    .image {
        position: relative;
    }
    .zhaiyao {
        position: absolute;
        bottom: 0;
        left: 0;
        color: #fff;
        background-color: rgba(0, 0, 0, 0.5);
    }
    .image img {
        width: 100%;
        height: auto;
    }
    .menu ul {
        list-style: none;
        padding: 0;
        display: flex;
        overflow-x: auto;
        overflow-y: hidden;
    }
    .menu li {
        white-space: nowrap;
        margin: 5px 5px;
    }

</style>

<script>
import tool from '../tool/tool';
import {Indicator} from 'mint-ui';
export default {
    //方法数据放在data里
    data () {
        return {
            newlistData: [],
            imagesData:[]
        }
    },
    //创建后加载
    created () {
        this.getPhotoListData();
        this.getImageData(0);
    },
    //写的方法
    methods:{
        getPhotoListData () {
            
            var url = `${tool.HTTP}${tool.SERVER_PATH}/api/getimgcategory`
            this.$http.get(url).then(
                res=>{
                    console.log(res);
                    this.newlistData = res.body.message;
                },res=>{
                    console.log('请求失败！！！');
                }
            ) 
        },
        getImageData(id){
            Indicator.open('loading...');
            var url = `${tool.HTTP}${tool.SERVER_PATH}/api/getimages/${id}`
            this.$http.get(url).then(
                res=>{
                    console.log(res);
                    this.imagesData = res.body.message;
                    Indicator.close();
                },res=>{
                    console.log('请求失败！！！！');
                    Indicator.close();
                }
            )
        }
    }
}
</script>


