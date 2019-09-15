<template>
  <div>
    <v-toolbar>
      <v-toolbar-title>Blog</v-toolbar-title>

      <div class="flex-grow-1"></div>

      <v-toolbar-items>
        <v-btn text>Forum</v-btn>
        <v-btn text> <v-icon>mdi-plus-circle</v-icon> Ask Question</v-btn>
        <v-btn text>Category</v-btn>


        
        <router-link to="/login">
          <v-btn text>Login</v-btn>
        </router-link>
        
      </v-toolbar-items>

       
    </v-toolbar>
  </div>
</template>
<script>
export default {
    
}
</script>       
<style lang="scss">
    
</style>