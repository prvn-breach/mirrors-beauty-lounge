<template>
    <div style="padding: 100px;">
        <span class="d-block h1 font-weight-bold mb-5">{{ getCms.page_title }}</span>
        <div v-html="getCms.page_content"></div>
    </div>
</template>
<script>
import { mapState } from 'vuex'
import { GET_CMS_PAGE_ACTION } from '@web/store/cms/actions'
export default {
    components: { },
    data() {
        return {
        }
    },
    computed:{
        ...mapState({
            getCms: state => state.Cms.getCMSPage
        })
    },
    mounted() {
        this.getCmsPage();
    },
    methods: {
        getCmsPage: function() {
            this.$store.dispatch('Cms/' + GET_CMS_PAGE_ACTION, this.$route.params.slug);
        }
    }
}
</script>