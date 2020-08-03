<template>
    <div class="container-fluid">
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