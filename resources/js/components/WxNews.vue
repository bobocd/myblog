<template>
    <div class="card">
        <div class="card-header">图文消息管理</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="news">
                        <div class="first" v-for="(v,i) in news" v-show="i==0">
                            <img :src="v.picurl"alt="">
                            <p>{{ v.title }}</p>
                            <div class="edit">
                                <button class="btn btn-secondary" type="button" @click="edit(v)">编辑</button>
                                <button class="btn btn-secondary" type="button" @click="del(i)">删除</button>
                                <button class="btn btn-secondary" type="button" @click="prev(i)" v-if="i>0">上移</button>
                                <button class="btn btn-secondary" type="button" @click="next(i)" v-if="i<news.length-1">下移</button>
                            </div>
                        </div>
                        <div class="item" v-for="(v,i) in news" v-show="i!=0">
                            <img :src="v.picurl" alt="">
                            <p>{{ v.title }}</p>
                            <div class="edit">
                                <button class="btn btn-secondary" type="button" @click="edit(v)">编辑</button>
                                <button class="btn btn-secondary" type="button" @click="del(i)">删除</button>
                                <button class="btn btn-secondary" type="button" @click="prev(i)" v-if="i>0">上移</button>
                                <button class="btn btn-secondary" type="button" @click="next(i)"v-if="i<news.length-1">下移</button>
                            </div>
                        </div>
                        <div class="pt-2">
                            <button type="button" class="btn btn-secondary btn-block" @click="add()">添加图文</button>
                        </div>
                    </div>

                </div>
                <div class="col-sm-8">
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">标题</label>
                        <div class="col-12 col-sm-8">
                            <input type="text" class="form-control form-control-sm" v-model="active.title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">描述</label>
                        <div class="col-12 col-sm-8">
                            <textarea class="form-control form-control-sm" v-model="active.discription" row="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputSmall" class="col-12 col-sm-3 col-form-label text-sm-right">缩略图</label>
                        <div class="col-sm-8">
                            <div class="input-group mb-1">
                                <input class="form-control  form-control-sm" v-model="active.picurl">
                                <div class="input-group-append">
                                    <button @click="upImagePc()" class="btn btn-secondary" type="button">单图上传</button>
                                </div>
                            </div>
                            <div style="display: inline-block;position: relative;">
                                <img :src="active.picurl" class="img-responsive img-thumbnail" width="150">
                                <em class="close" style="position: absolute;top: 3px;right: 8px;" title="删除这张图片"
                                    onclick="removeImg(this)">×</em>
                            </div>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="inputSmall" class="col-12 col-sm-3 col-form-label text-sm-right">链接</label>
                        <div class="col-12 col-sm-8">
                            <input type="text" class="form-control form-control-sm" v-model="active.url">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <textarea name="data" hidden>{{ news }}</textarea>
    </div>
</template>

<script>
    export default {
        name: "WxNews",
        props:{
            wxnew:{
                type:Array,
                default: function() {
                    return [{
                        'title': '荟天下',
                        'discription': 'test',
                        'picurl': 'https://ss0.bdstatic.com/70cFuHSh_Q1YnxGkpoWK1HF6hhy/it/u=1246451335,909670857&fm=26&gp=0.jpg',
                        'url': '#'
                    }]
                }
            }

        },
        data(){
            return {
                news:this.wxnew,
                active:{}
            }
        },
        mounted(){
            this.active=this.news[0];
        },
        methods:{
            add(){
                if(this.news.length<5){
                    this.news.push({title:'msif001','discription':'test','picurl':'https://ss0.bdstatic.com/70cFuHSh_Q1YnxGkpoWK1HF6hhy/it/u=1246451335,909670857&fm=26&gp=0.jpg','url':'#'});
                }

            },
            del(pos){
                this.news.splice(pos,1);
            },
            prev(pos){
                let item =this.news[pos];
                this.news.splice(pos,1,this.news[pos-1]);
                this.news.splice(pos-1,1,item);
            },
            next(pos){
                let item =this.news[pos];
                this.news.splice(pos,1,this.news[pos+1]);
                this.news.splice(pos+1,1,item);
            },
            edit(item){
                this.active=item;
            },
            upImagePc(){
                let This=this;
                hdjs.image(function (images) {
                    This.active.picurl=images[0];
                })
            }
        }
    }
</script>

<style scoped>
    .news {
        width: 300px;
    }
    .news div.first {
        border: solid 1px #ddd;
        position: relative;
    }
    .news div.first:hover div.edit {
        display: block;
    }
    .news div.first img {
        width: 100%;
    }
    .news div.first p {
        background: #333;
        color: #fff;
        padding: 5px 10px;
        margin-bottom: 0;
    }
    .news div.item {
        overflow: hidden;
        height: auto;
        padding: 15px;
        border: solid 1px #ddd;
        position: relative;
    }
    .news div.item:hover div.edit {
        display: block;
    }
    .news div.item img {
        width: 60px;
        height: 60px;
        float: right;
    }
    .news div.item p {
        float: left;
        padding: 5px 10px;
    }
    .news div.edit {
        display: none;
        position: absolute;
        left: 0;
        right: 0px;
        bottom: 0;
        background: #333;
        text-align: center;
        padding: 5px 0;
    }
    /*# sourceMappingURL=news.css.map */
</style>
