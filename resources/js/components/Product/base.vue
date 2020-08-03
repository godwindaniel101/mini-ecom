<template>
    <div class="container-fluid __zeroAll">
        <Nav/>
    <router-view></router-view>
    </div>
</template>
<script>
import Nav from './nav'
export default {
    components:{
        Nav
    }
}
</script>