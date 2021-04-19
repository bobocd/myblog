<template>
    <div class="card-body card-body-contrast">
        <div class="row">
            <div class="col-sm-4">
                <div class="mobile">
                    <div class="menu-container">
                        <div class="menu-container">
                            <div class="menu" v-for="(v,i) in menus">
                                <h5><i @click="delMenu(i)" class="fa fa-minus-square" aria-hidden="true"></i>
                                    <span @click="setActiveMenu(v)">{{ v.name }}</span>
                                </h5>
                                <dl>
                                    <dd v-if="v.sub_button.length<5"><i @click="addSubMenu(v)" class="fa fa-plus-square"></i>添加菜单</dd>
                                    <dd v-for="(m,n) in  v.sub_button" ><i @click="delSubMenu(v,n)" class="fa fa-minus-square"></i>
                                        <span @click="setActiveMenu(m)">{{ m.name }}</span>
                                    </dd>
                                </dl>
                            </div>
                            <div class="menu" v-if="menus.length<3">
                                <h5 @click="add()"><i class="fa fa-plus-square" aria-hidden="true"></i>添加菜单</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        基本设置
                    </div>
                    <div class="card-block">
                        <div class="form-group row">
                            <label for="inputSmall" class="col-12 col-sm-3 col-form-label text-sm-right">菜单名称</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input  type="text" value="" class="form-control form-control-sm" name="name" v-model="title">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        菜单设置
                    </div>
                    <div class="card-block">
                        <div class="form-group row">
                            <label for="inputSmall" class="col-12 col-sm-3 col-form-label text-sm-right">菜单</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input   type="text" value="" class="form-control form-control-sm" v-model="active.name">
                            </div>
                        </div>
                        <div class="form-group row pt-1 pb-1">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right">动作</label>
                            <div class="col-12 col-sm-8 col-lg-6 form-check mt-2">
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="radio-inline" checked="" class="custom-control-input" v-model="active.type" value="view">
                                    <span class="custom-control-label">链接</span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="radio-inline" class="custom-control-input" v-model="active.type" value="click">
                                    <span class="custom-control-label">关键词</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row" v-if="active.type=='view'">
                            <label for="inputSmall" class="col-12 col-sm-3 col-form-label text-sm-right">链接</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input  type="text" value="" class="form-control form-control-sm" v-model="active.url">
                            </div>
                        </div>
                        <div class="form-group row" v-if="active.type=='click'">
                            <label for="inputSmall" class="col-12 col-sm-3 col-form-label text-sm-right">关键词</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input  type="text" value="" class="form-control form-control-sm" v-model="active.key">
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-muted">
                        <textarea name="data" display="none" hidden> {{menus}}</textarea>
                        <button class="btn-primary btn">保存菜单</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Wxmenu",
        props:{
            menudata:{
                type:Array,
                default:''
            },
            menuname:{
                type:String,
                default:''
            }
        },
        data(){
            return{
                menus:this.menudata,
                active:{},
                title:this.menuname
            }
        },
        methods:{
            setActiveMenu(item){
                this.active=item;
            },
            //添加顶级菜单
            add(){
                if (this.menus.length<3){
                    let menu ={type:'view',name:'新建菜单',sub_button:[]};
                    this.menus.push(menu);
                    this.setActiveMenu(menu)
                }
            },
            //删除顶级菜单
            delMenu(pos){
                this.menus.splice(pos,1);
            },
            //增加二级菜单
            addSubMenu(item){
                if (item.sub_button.length<5){
                    let menu ={type:'view',name:'新建子菜单',sub_button:[]};
                    item.sub_button.push(menu);
                    this.setActiveMenu(menu)
                }
            },
            delSubMenu(item,pos){
                item.sub_button.splice(pos,1);
            }
        }
    }
</script>

<style scoped>
    .mobile {
        border: solid 1px #ddd;
        height: 550px;
        display: flex;
        flex-direction: row;
        align-items: flex-end;
    }
    .mobile .menu-container {
        display: flex;
        flex: 1;
    }
    .mobile .menu-container .menu {
        display: flex;
        flex-direction: column-reverse;
        flex: 1;
    }
    .mobile .menu-container .menu h5 {
        border: solid 1px #ddd;
        text-align: center;
        padding: 5px 10px;
        margin: 0px;
        font-weight: bold;
        background: white;
    }
    .mobile .menu-container .menu dl {
        display: flex;
        flex-direction: column-reverse;
        margin-bottom: 0;
    }
    .mobile .menu-container .menu dl dd {
        border: solid 1px #ddd;
        text-align: center;
        padding: 5px 10px;
        margin: 0;
        background: white;
    }
    /*# sourceMappingURL=index.css.map */
</style>
