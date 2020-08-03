<template>
    <div class="container-fluid __zeroAll">
        <Nav />
        <router-view></router-view>
        <!-- base directory to all folders -->
    </div>
</template>
<script>
import Nav from "./nav";
export default {
    components: {
        Nav
    }
};
</script>
