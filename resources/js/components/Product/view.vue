<template>
    <div class="containr-fluid">
        <div class="preloader_wrap" v-if="preloader">
            <div class="preloader_image">
                <img src="/image/loader.gif" />
            </div>
        </div>
        <div class="_hgyst">
            
            <div class="container-fluid">
                <div class=" top_row sub_wrap" v-if="subload">
                    <div class="preloader_image">
                    <img src="/image/loader.gif" />
                </div>
            </div>
            <section class="_prdts " v-if="!subload">
                <div class="lists">
                    <router-link
                        v-for="item in productArray.data"
                        :key="productArray.data.id"
                        :to="{ path: '/product/preview/' + item.id }"
                        tag="div"
                    >
                        <ViewItem :item="item" v-if="item" />
                    </router-link>
                </div>
            </section>
        </div>
        </div>
        <div class="_row_x">
                <div class="paginate">
                    <pagination
                        :data="productArray"
                        @pagination-change-page="getResults"
                    ></pagination>
            </div>
        </div>
    </div>
</template>
<script>
import ViewItem from "../Shared/ProductItemComponent";
export default {
    components: {
        ViewItem
    },
    data() {
        return {
            subload: false,
            preloader: true,
            productArray: {}
        };
    },
    methods: {
        //get all product details
        getProduct() {
            axios.get("/api/product").then(({ data }) => {
                this.productArray = data;
                this.preloader = false;
            });
        },
        getResults(page = 1) {
            //pagination function
            this.subload = true;
            axios
                .get("/api/product?page=" + page)
                .then(({ data }) => {
                    this.productArray = data;
                    this.subload = false;
                })
                .catch(e => {
                    console.log(e);
                });
        }
    },
    mounted() {
        this.getProduct();
    }
};
</script>
