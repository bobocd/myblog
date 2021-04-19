<template>
    <div class="card">
        <div class="card-header">
            添加回复规则
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-12 col-sm-3 col-form-label text-sm-right">回复规则名称</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <input type="text" class="form-control form-control-sm" v-model="rule.name">
                </div>
            </div>
            <div class="form-group row" v-for="(v,i) in rule.keywords">
                <label class="col-12 col-sm-3 col-form-label text-sm-right">关键词</label>
                <div class="col-12 col-sm-8 col-lg-6">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-sm" v-model="v.key">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" @click="del(i)">删除</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            <button class="btn btn-secondary" type="button" @click="add()">添加关键词</button>
        </div>
        <textarea name="_rule"  hidden> {{ rule }}</textarea>
    </div>
</template>

<script>
    export default {
        name: "WxRule",
        props:{
            rulecontent:{
                type:null,
                default:''
            }
        },
        data(){
            return {
                rule:this.rulecontent
            }
        },
        methods:{
            add(){
                // console.log('123');
                this.rule.keywords.push({key:''})
            },
            del(pos){
                this.rule.keywords.splice(pos,1)
            }
        }
    }
</script>

<style scoped>

</style>
