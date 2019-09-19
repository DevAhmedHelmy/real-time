<template>

<v-card>
    <v-card-title>
        <div>
            <div class="headline">
                <p class="display-1 text--primary">{{data.title}}</p>
            </div>
                <p class="grey--text">Publish By : {{data.user}} in {{data.created_at}}</p>
                
            
        </div>
      
      
      <v-spacer></v-spacer>
    <v-btn color="teal">5 Replies</v-btn>
     
      
    </v-card-title>
     <v-card-text v-html="data.body"></v-card-text>
  </v-card>


  
</template>

<script>
export default {
    props:['data']
}
</script>