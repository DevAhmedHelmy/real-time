<template>
   <div mt-2>
    <toolbar></toolbar>
    
        <router-view></router-view>
    <app-footer></app-footer>
   </div>
    
</template>
<script>
import toolbar from './Toolbar.vue';
import Login from './login/Login.vue';
import AppFooter from './AppFooter.vue';
export default {
    components:{toolbar, AppFooter,Login}
}
</script>       
<style lang="scss">
    
</style>