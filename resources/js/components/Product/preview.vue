<template>
    <div class="container-fluid __zeroAll">
        <div class="preloader_wrap" v-if="preloader">
            <div class="preloader_image">
                <img src="/image/loader.gif" />
            </div>
        </div>
        <div class="outter_div" v-if="productDetail != null">
             <section class="_prdt">
        <div class="_mg">
             <img
                        :src="productDetail.image"
                        v-if="productDetail.image"
                    />
        </div>
        <div class="_detl">
            <div class="_tpbt">
                <router-link class="_bck" :to="'/product/view'" tag="button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-left" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z"/>
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <line x1="5" y1="12" x2="9" y2="16" />
                        <line x1="5" y1="12" x2="9" y2="8" />
                      </svg>
                    Back
                </router-link>
                <div class="_tdyd">

                
                <router-link class="_pbh" :to="{ path: '/product/edit/' + productDetail.id }" tag="button">
                        <svg
                            width="15"
                            height="15"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512"
                            class="svg-inline--fa fa-edit fa-w-18 fa-3x"
                        >
                            <path
                                fill="blue"
                                d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"
                                class=""
                            ></path>
                        </svg>
                    Edit
                </router-link>
                <button class="_pbd" @click="deleteProduct(productDetail.id)">
                    <svg
                                width="15"
                                height="15"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512"
                                class="svg-inline--fa fa-trash fa-w-14 fa-3x"
                                
                            >
                                <path
                                    fill="red" 
                                    d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"
                                    class=""
                                ></path>
                            </svg>
                    Delete
                </button>
                </div>
            </div>    
            <div class="_name">
               {{ productDetail.name }}
            </div>
            <div class="_cat">
                Name
            </div>
            <div class="_prc">
                <div class="lbl">
                    Cost
                </div>
                <div class="_val">
                    {{ productDetail.cost }}

                </div>
            </div>
            <div class="_prc">
                <div class="lbl">
                    Description
                </div>
                <div class="_val _dsc">
                 {{ productDetail.description }}
                 </div>
            </div>

        </div>

    </section>
            <!-- <div class="preview_left">
                <div class="preview_image">
                    <img
                        :src="productDetail.image"
                        v-if="productDetail.image"
                    />
                </div>
            </div>
            <div class="preview_right">
                <div class="admin">
                    <router-link :to="'/product/view'" class="go_back" tag="div">
                        
                        <svg width="30" height="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-arrow-left fa-w-14 fa-3x"><path fill="darkgreen" d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z" class=""></path></svg>
                    </router-link>
                    <div class="admin_action">
                        <span @click="deleteProduct(productDetail.id)">
                            <svg
                                width="30"
                                height="30"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512"
                                class="svg-inline--fa fa-trash fa-w-14 fa-3x"
                            >
                                <path
                                    fill="red"
                                    d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"
                                    class=""
                                ></path>
                            </svg>
                        </span>
                   

                    <router-link
                        class=""
                        :to="{ path: '/product/edit/' + productDetail.id }"
                        tag="span"
                    >
                        <svg
                            width="30"
                            height="30"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512"
                            class="svg-inline--fa fa-edit fa-w-18 fa-3x"
                        >
                            <path
                                fill="blue"
                                d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"
                                class=""
                            ></path>
                        </svg>
                    </router-link>
                     </div>
                </div>
                <div class="preview_id _mxy">
                    <span>Id</span> <br />
                    {{ productDetail.id }}
                </div>
                <div class="preview_name _mxy">
                    <span>Name</span> <br />
                    {{ productDetail.name }}
                </div>
                <div class="preview_cost _mxy">
                    <span>Cost</span> <br />
                    ₦ {{ productDetail.cost }}
                </div>
                <div class="preview_Description _mxy">
                    <span>Description</span> <br />
                    {{ productDetail.description }}
                </div>
            </div> -->
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            preloader: true,
            productDetail: {
                id: "",
                name: "",
                cost: "",
                description: "",
                image: ""
            }
        };
    },
    methods: {
        deleteProduct(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then(result => {
                if (result.value) {
                    axios
                        .delete("/api/product/" + id)
                        .then(({ data }) => {
                            Toast.fire({
                                icon: "success",
                                title: data.message
                            });
                            this.$router.push({ path: "/product/view" });
                        })
                        .catch(e => {
                            console.log(e);
                        });
                }
            });
        },
        presentView() {
            var id = this.$route.params.id;
            axios
                .get("/api/product/" + id)
                .then(({ data }) => {
                    this.productDetail = data;
                    this.preloader = false;
                })
                .catch(e => {
                    console.log(e);
                });
        }
    },
    mounted() {
        this.presentView();
    }
};
</script>
