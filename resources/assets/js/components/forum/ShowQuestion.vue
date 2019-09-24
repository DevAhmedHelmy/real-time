<template>

<v-card>
    <v-card-title>
        <div>
            <div class="headline">
                <p class="display-1 text--primary">{{data.title}}</p>
            </div>
                <p class="grey--text">Publish By : {{data.user}} in {{data.created_at}} </p>
                
            
        </div>
      
      
      <v-spacer></v-spacer>
    <v-btn color="teal">{{data.reply_count}} Replies</v-btn>
     
      
    </v-card-title>
    <v-card-text v-html="body"></v-card-text>
    <v-card-actions v-if="own">
        <v-btn icon color="green" @click="edit">
            <v-icon>edit</v-icon>
        </v-btn>
        <v-btn icon color="red" @click="destroy">
            <v-icon>delete</v-icon>
        </v-btn>
    </v-card-actions>
  </v-card>


  
</template>

<script>
import md from 'marked'
export default {
    props:['data'],
    data(){
        return{
            own:User.own(this.data.user_id)
        }
    },
    computed:{
        body(){
            return md.parse(this.data.body)
        }
    },
    methods:{
        destroy(){
            axios.delete(`/api/questions/${this.data.slug}`)
            .then(res => this.$router.push('/forum'))
            .catch(error=> console.log(error.response.data));
        },
        edit(){
            EventBus.$emit('startEditing');
        }
    }
}
</script>