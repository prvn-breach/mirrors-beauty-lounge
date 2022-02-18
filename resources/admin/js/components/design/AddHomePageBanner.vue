<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Add Home Page Banner </h2>
                    <div class="row dv_search_delete_action_common"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Banner Type </label>
                                        <select v-model="addHomePageBanner.banner_id" :class="status($v.addHomePageBanner.banner_id)" @input="setValue($event)" name="banner_id" class="form-control dv_common_select_for_all">
                                            <option value="">Select </option>
                                            <option :value="banner['id']" v-for="(banner,index) in getBanners" :key="index">{{ banner['name'] }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Desktop Image </label>
                                        <input type="file" :class="status($v.addHomePageBanner.image)" @change="setValue($event)" name="image" class="form-control dv_common_input_for_all">
                                        <img v-if="image" :src="image" class="p-3" style="height: 120px; width: 270px;" alt="">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Mobile Image </label>
                                        <input type="file" :class="status($v.addHomePageBanner.mobile_image)" @change="setValue($event)" name="mobile_image" class="form-control dv_common_input_for_all">
                                        <img v-if="mobile_image" :src="mobile_image" class="p-3" style="height: 120px; width: 270px;" alt="">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Link </label>
                                        <input type="text" v-model="addHomePageBanner.link" :class="status($v.addHomePageBanner.link)" @input="setValue($event)" name="link" class="form-control dv_common_input_for_all">
                                    </div>
                                    <div class="form-group mb-0">
                                        <label class="ui-switch ui-switch-md info m-t-xs float-left mr-3"><input checked="" v-model="addHomePageBanner.status" type="checkbox"> <i></i></label>
                                        <label class="text-muted text-capitalize" for="name">Banner status </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-default text-muted dv_cancel_submit_btn" @click="$router.push({ name: 'homePageBanners' });">back</button>
                            <button type="button" class="btn btn-default dv_save_submit_btn" @click="saveHomePageBanner">save </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import { mapState } from 'vuex'
import { required } from 'vuelidate/lib/validators';
import { deleteEmptyKeys } from "../../mixins";
import { GET_BANNERS_ACTION, ADD_HOME_PAGE_BANNER_ACTION } from '@admin/store/design/actions';
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            addHomePageBanner: {
                banner_id: '',
                image: '',
                mobile_image: '',
                link: '',
                status: true
            },
            image: '',
            mobile_image: ''
        }
    },
    validations: {
        addHomePageBanner: { 
            banner_id: { required },
            image: { required },
            mobile_image: { required },
            link: { required },
            status: true
        }
    },
    computed:{
        ...mapState({
            getBanners: state => state.getDesign.getBanners
        })
    },
    mounted() {
        this.getBannersList();
    },
    methods: {
        status: function(validation) {
            if(validation != undefined){
                return {
                    error: validation.$error,
                    dirty: validation.$dirty
                }
            }
        },
        setValue: function(event) {
            let images_fields = [ 'image', 'mobile_image' ];
            if (images_fields.includes(event.target.name)) {
                this.getConvertBase64Image(event.target.files[0], event.target.name);
            } else {
                this.addHomePageBanner[event.target.name] = event.target.value;
            }
            this.$v.addHomePageBanner[event.target.name].$touch();
        },
        getConvertBase64Image: function(image, name) {
            var reader = new FileReader()
            reader.readAsDataURL(image)
            return reader.onload = (e) => {
                this.addHomePageBanner[name] = reader.result;
                this[name] = URL.createObjectURL(image);
            }
        },
        getBannersList: function () {
            this.$store.dispatch('getDesign/' + GET_BANNERS_ACTION, {});
        },
        saveHomePageBanner: function() {
            this.$v.addHomePageBanner.$touch();
            if (!this.$v.addHomePageBanner.$invalid) {
                let params = deleteEmptyKeys(this.addHomePageBanner);
                this.loaderModal('show');
                this.$store.dispatch('getDesign/' + ADD_HOME_PAGE_BANNER_ACTION, params).then(() => {
                    this.loaderModal('hide');
                    this.$router.push({ name: 'homePageBanners' });
                }).catch(() => this.loaderModal('hide'));
            }
        }
    }
}
</script>