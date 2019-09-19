<template>
  <div>
    <v-toolbar>
      <v-toolbar-title>Blog</v-toolbar-title>

      <div class="flex-grow-1"></div>

      <v-toolbar-items>
        
        <router-link
          v-for="item in items"
          :key="item.title"
          :to="item.to"
          v-if="item.show">
          <v-btn text>{{item.title}}</v-btn>
        </router-link>
       


        
        
        
      </v-toolbar-items>

       
    </v-toolbar>
  </div>
</template>
<script>
export default {
    data(){
      return{
        items:[
          {title:'Forum', to:'/forum',show:true},
          {title:'Ask Question', to:'/ask',show:User.loggedIn()},
          {title:'Category', to:'/category',show:User.loggedIn()},
          {title:'Login', to:'/login',show: !User.loggedIn()},
          {title:'Logout', to:'/logout',show:User.loggedIn()},
        ]
      }
    },
    created(){
      EventBus.$on('logout',()=>{
        User.logout()
      });
    }
}
</script>       
<style lang="scss">
    
</style>