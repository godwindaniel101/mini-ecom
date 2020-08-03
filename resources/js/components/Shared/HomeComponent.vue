<template>
    <div class="my_wrapper">
        <!-- <div class="container-fluid"> -->
            <!-- <div class="row">
                <div class="col-lg-8 offset-lg-2"> -->
                    <div class="containerWrapper">
                        <div class="ImageContainer">
                            <div class="ImageCover"></div>
                            <div class="ImageCover_2">
                                <div class="action_div">
                                    <div class="welcome_tag">
                                        <p>
                                            Welcome !
                                        </p>
                                    </div>
                                    <router-link
                                        to="/product/view"
                                        class="btn btn-primary my-btn"
                                        tag="button"
                                    >
                                        View Products
                                    </router-link>
                                    <router-link
                                        to="/product/create"
                                        class="btn btn-success my-btn"
                                        tag="button"
                                    >
                                        Create Products
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- </div>
            </div> -->
        <!-- </div> -->
    </div>
</template>

<script>
import { Form, HasError, AlertError } from "vform";
export default {
    data() {
        return {};
    },
    methods: {},
    mounted() {}
};
</script>
