<template>
  <v-card>
    <v-card-title primary-title >
       <h3 class="headline mb-0">
           <router-link :to="data.path">{{data.title}}</router-link>
        </h3>
       <div class="grey--text">{{data.created_at}} {{data.user}}</div>
    </v-card-title>
    <v-card-text>
        {{data.body}}
    </v-card-text>
    <v-card-actions>
      <v-btn text>Click</v-btn>
    </v-card-actions>
  </v-card>
 
</template>

    
        
            
               

        


<script>
 
export default {
    props:['data']
    }
     
</script>

<style scoped>

</style>