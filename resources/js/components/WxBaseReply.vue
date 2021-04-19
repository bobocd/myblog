<template>
    <div class="card">
        <div class="card-header">基本回复管理</div>

        <div class="card-body card-body-contrast">

            <div class="form-group row">
                <div class="col-md-10" v-for="(v,i) in contents">
                    <textarea id="content"  rows="3" class="form-control form-control" v-model="v.content"></textarea>
                    <a href="javascript:"><i class="fa fa-github-alt" aria-hidden="true"></i>表情</a>
                    <button class="btn btn-secondary" type="button" @click="del(i)">删除</button>
                </div>
            </div>

        </div>
        <div class="card-footer text-muted">
            <button class="btn btn-secondary" type="button" @click="add">添加回复条目</button>
        </div>
        <textarea name="_reply" id="" cols="30" rows="10" hidden>{{contents}}</textarea>
    </div>
</template>

<script>
    export default {
        name: "WxBaseReply",
        props:{
            wxreply:{
                type:Array,
                derfault:''
            }
        },
        data(){
            return {
                contents:this.wxreply
            }
        },
        mounted(){
            this.emotion();
        },
        updated(){
            this.emotion();
        },
        methods:{
            emotion(){
                var This=this;
                $('textarea').each(function(){

                })

            },
            add(){
                this.contents.push({content:''});
            },
            del(pos){
                this.contents.splice(pos,1)
            }
        }
    }
</script>

<style scoped>

</style>
