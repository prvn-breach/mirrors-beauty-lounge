<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">View Home Page Banner </h2>
                    <div class="row dv_search_delete_action_common"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Banner Type </label>
                                        <select v-model="saveHomePageBanner.banner_id" :class="status($v.saveHomePageBanner.banner_id)" @input="setValue($event)" name="banner_id" class="form-control dv_common_select_for_all">
                                            <option value="">Select </option>
                                            <option :value="banner['id']" v-for="(banner,index) in getBanners" :key="index">{{ banner['name'] }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Desktop Image </label>
                                        <input type="file" :class="status($v.saveHomePageBanner.image)" @change="setValue($event)" name="image" class="form-control dv_common_input_for_all">
                                        <img :src="image" class="p-3" style="height: 120px; width: 270px;" alt="">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Mobile Image </label>
                                        <input type="file" :class="status($v.saveHomePageBanner.mobile_image)" @change="setValue($event)" name="mobile_image" class="form-control dv_common_input_for_all">
                                        <img :src="mobile_image" class="p-3" style="height: 120px; width: 270px;" alt="">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Link </label>
                                        <input type="text" v-model="saveHomePageBanner.link" :class="status($v.saveHomePageBanner.link)" @input="setValue($event)" name="link" class="form-control dv_common_input_for_all">
                                    </div>
                                    <div class="form-group mb-0">
                                        <label class="ui-switch ui-switch-md info m-t-xs float-left mr-3"><input checked="" v-model="saveHomePageBanner.status" type="checkbox"> <i></i></label>
                                        <label class="text-muted text-capitalize" for="name">Banner status </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-default text-muted dv_cancel_submit_btn" @click="$router.push({ name: 'homePageBanners' });">back</button>
                            <button type="button" class="btn btn-default dv_save_submit_btn" @click="updateHomePageBanner">save </button>
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
import { GET_BANNERS_ACTION, GET_HOME_PAGE_BANNER_ACTION, UPDATE_HOME_PAGE_BANNER_ACTION } from '@admin/store/design/actions';
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            saveHomePageBanner: {
                banner_image_id: '',
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
        saveHomePageBanner: { 
            banner_id: { required },
            image: { required },
            mobile_image: { required },
            link: { required },
            status: true
        }
    },
    computed:{
        ...mapState({
            getBanners: state => state.getDesign.getBanners,
            getHomePageBanner: state => state.getDesign.getHomePageBanner,
        })
    },
    mounted() {
        this.getBannerImage();
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
                this.saveHomePageBanner[event.target.name] = event.target.value;
            }
            this.$v.saveHomePageBanner[event.target.name].$touch();
        },
        getConvertBase64Image: function(image, name) {
            var reader = new FileReader()
            reader.readAsDataURL(image);
            return reader.onload = (e) => {
                this.saveHomePageBanner[name] = reader.result;
                this[name] = URL.createObjectURL(image);
            }
        },
        getBannersList: function () {
            this.$store.dispatch('getDesign/' + GET_BANNERS_ACTION, {});
        },
        getBannerImage: function() {
            this.$store.dispatch('getDesign/' + GET_HOME_PAGE_BANNER_ACTION, this.$route.params.banner_image_id).then(() => {
                this.saveHomePageBanner.banner_image_id = this.getHomePageBanner.id;
                this.saveHomePageBanner.banner_id = this.getHomePageBanner.banner_id;
                this.saveHomePageBanner.link = this.getHomePageBanner.link;
                this.saveHomePageBanner.status = this.getHomePageBanner.status;
                fetch(this.baseUrlImage+this.getHomePageBanner.image)
                    .then(response => response.blob())
                    .then(blob => {
                        this.getConvertBase64Image(blob, 'image');
                    })
                fetch(this.baseUrlImage+this.getHomePageBanner.mobile_image)
                    .then(response => response.blob())
                    .then(blob => {
                        this.getConvertBase64Image(blob, 'mobile_image');
                    })
            });
        },
        updateHomePageBanner: function() {
            this.$v.saveHomePageBanner.$touch();
            if (!this.$v.saveHomePageBanner.$invalid) {
                let params = deleteEmptyKeys(this.saveHomePageBanner);
                this.loaderModal('show');
                this.$store.dispatch('getDesign/' + UPDATE_HOME_PAGE_BANNER_ACTION, params).then(() => {
                    this.loaderModal('hide');
                    this.$router.push({ name: 'homePageBanners' });
                }).catch(() => this.loaderModal('hide'));
            }
        }
    }
}
</script>