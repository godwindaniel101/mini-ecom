<template>
    <div class="my_wrapper">
        <div class="containerWrapper">
            <div class="ImageContainer">
                <div class="ImageCover"></div>
                <div class="ImageCover_2">
                    <div class="action_div">
                        <div class="_welcome_tag">
                            <p>
                                Welcome !
                            </p>
                        </div>
                        <router-link
                            to="/product/view"
                            class="_btn_r _secondary"
                            tag="button"
                        >
                            View Products
                        </router-link>
                        <router-link
                            to="/product/create"
                            class="_btn_r _primary"
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
