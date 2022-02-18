<template>
	 <div class="row" v-if="getAttributes.length > 0" >
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header"><strong>Attributes Option </strong></div>
                <ul class="dv_varient_product_list">
                    <li v-for="(attribute,index) in getAttributes" :key="index">
                        <a href="javascript:void(0)"  :class="[attribute.id==getAttrituenId?'active':'',(getChangeExistArray(attribute)>0)?'filledattre':'']" @click="getAttributeOptions(attribute)" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="active"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            {{attribute.name}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header"><strong>Select Attribute value </strong></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3 pb-3 b-b" v-for="(option,index) in getOptions.get_options" :key="index">
                            <label class="ui-check m-0 ui-check-rounded ui-check-md"><input :checked="checkedChangeOptions(option)" type="checkbox" @change="getChangeOptions($event,getOptions,option)"> <i></i> {{option.name}} </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import {LOAD_ATTRIBUTE_BY_CATEGORY_ACTION,DELETE_ATTRIBUTE_OPTION_PRODUCT_ACTION } from '@admin/store/products/actions'
import { mapState } from 'vuex'
export default {
    props: {
        categoryId: {
            categoryId: Object,
            required: true,
        }, 
        getProduct: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
            baseUrl:Vue.config.baseurl,
            baseUrlImage:Vue.config.baseUrlImage,
            getOptions:[],
            getAttrituenId:'',
            getAttributeOption:[],
        }
    },
    watch: { 
      	categoryId: function(newVal, oldVal) { // watch it
            this.getChangeAttribute();
        }
    },
    components: {},
    computed:{
        ...mapState({
            getAttributes: state => state.getProduct.getAttributes
        }),
    },
    methods: {
        getChangeExistArray:function(getAttribute){
            let attr = this.getAttributeOption.find(function(item){return getAttribute.id == item.attribute_id});
            if(attr != undefined){
                return true;
            }else{
                return false;
            }
        },
        checkedChangeOptions:function(option){
            let _this = this;
            let attr = _this.getAttributeOption.filter(function(item){return option.attribute_id == item.attribute_id});
                if(attr.length > 0){
                    let getAttr = attr.map(function(item){
                        if(item.get_options.length > 0){
                        let itemOption = item.get_options.filter(function(itemOption){
                            return itemOption.option_id == option.id
                        });
                        if(itemOption.length > 0){
                            return true;
                        }else{
                            return false;
                        }
                        }else{
                            return false;
                        }
                        
                    })[0]
                    
                    return getAttr;
                }else{
                    return false;
                }
        },
        getChangeOptions:function(event,getAttribute,option){
            let _this = this;
            if(event.target.checked == true){

                let attr = _this.getAttributeOption.filter(function(item){return getAttribute.id == item.attribute_id});
                if(attr.length == 0){
                    _this.getAttributeOption.push({
                        id:'',
                        category_id:getAttribute.category_id,
                        created_at:getAttribute.created_at,
                        deleted_at:getAttribute.deleted_at,
                        get_options:[],
                        attribute_id:getAttribute.id,
                        name:getAttribute.name,
                        status:getAttribute.status,
                        
                    });
                }
                    attr = _this.getAttributeOption.filter(function(item){return getAttribute.id == item.attribute_id});
                if(attr.length > 0){
                    
                    _this.getAttributeOption.map(function(item){
                        if(item.attribute_id == getAttribute.id){
                            let itemOption = [];
                            if(item.get_options.length > 0){
                                    itemOption = item.get_options.filter(function(itemOption){return itemOption.option_id == option.id});
                                
                            }
                            
                            if(itemOption.length == 0){
                                item.get_options.push({
                                        id:'',
                                        option_id:option.id,
                                        attribute_id:option.attribute_id,
                                        name:option.name,
                                        image:option.image,
                                        status:option.status,
                                        name:option.name,
                                    });
                            }
                        }
                    })
                }

            }else{

                _this.getAttributeOption.map(function(item){
                    if(item.attribute_id == getAttribute.id){
                        let options = item.get_options.filter(function(itemOption){return itemOption.option_id == option.id});
                        if(options.length > 0){
                            let optionFirst = options[0];
                            if(optionFirst.id != null && optionFirst.id > 0){
                                _this.$store.dispatch('getProduct/' + DELETE_ATTRIBUTE_OPTION_PRODUCT_ACTION,{
                                option_id:optionFirst.id,
                                attribute_id:item.id,
                            }).then(function(e){});
                            }
                        }
                        let itemOption = item.get_options.filter(function(itemOption){return itemOption.option_id != option.id});
                        if(item.get_options.length > 0){
                            item.get_options = itemOption;
                        }
                    }
                });
                let attr = _this.getAttributeOption.filter(function(item){return getAttribute.id == item.attribute_id});
                if(attr.length > 0){
                    let itemOption = attr[0].get_options.filter(function(itemOption){return itemOption.option_id != option.id});
                    if(itemOption.length == 0){
                        _this.getAttributeOption = _this.getAttributeOption.filter(function(item){return getAttribute.id != item.attribute_id});
                        
                    }
                }
                    
            }
            _this.$emit('getAttributeOption',_this.getAttributeOption);
            


        },
        getAttributeOptions:function(options){
            this.getAttrituenId = options.option_id;
            this.getOptions=options;
        },
        getChangeAttribute:function(){
            let _this = this;
            if(_this.categoryId != ''){
                _this.$store.dispatch('getProduct/' + LOAD_ATTRIBUTE_BY_CATEGORY_ACTION,_this.categoryId).then(function(e){
                    if(_this.getAttributes.length > 0){
                        _this.getAttrituenId = _this.getAttributes[0].id;
                        _this.getOptions=_this.getAttributes[0];
                    }
                    if(_this.getProduct.id != undefined && _this.getProduct.id > 0 ){
                        _this.getAttributeOption =  _this.getProduct.attributes;
                    }
                });
            }   
        }
    },
    created: function(){
        let _this = this;   
    },
    mounted(){
        let _this = this;
        this.getChangeAttribute()
    }
}
</script>