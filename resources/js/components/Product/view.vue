<template>
    <div class="containr-fluid">
        <div class="row top_row">
            <div class="col-lg-3"  v-for="item in productArray" :key="productArray.id" >
                <router-link :to="{path: '/product/preview/'+ item.id}" tag="div">
                  <ViewItem :item="item" v-if="item"/>
                </router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 bottom_row">
                <div class="paginate">

                </div>
            </div>
        </div>
    </div>
</template>
<script>
import ViewItem from "../Shared/ProductIteComponent";
export default {
    components:{
        ViewItem
    },
    data() {
        return {
            productArray: []
        };
    },
    methods: {
        getProduct() {
            axios.get("/api/product").then(({ data }) => {
                this.productArray = data.data;
            });
        }
    },
    mounted() {
        this.getProduct();
    }
};
</script>
