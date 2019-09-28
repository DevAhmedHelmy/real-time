<template>
    <div class="mt-3">
        <v-card>
            <v-card-title>
                <div class="headline">{{data.user}} </div>
                <div> {{data.created_at}}</div>
                <v-spacer></v-spacer>
                <like :content = "data"></like>
            </v-card-title>
            <v-divider></v-divider>
            <edit-reply v-if="editing" :reply="data"></edit-reply>
            <v-card-text v-else v-html="data.reply"></v-card-text>
            <v-divider></v-divider>
            <div v-if="!editing">
                <v-card-actions v-if="own">
                    <v-btn icon color="green">
                        <v-icon @click="edit">edit</v-icon>
                    </v-btn>
                    <v-btn icon color="red">
                        <v-icon @click="destroy">delete</v-icon>
                    </v-btn>
                </v-card-actions>
            </div>
            
        </v-card>
    </div>
  
</template>
<script>
import EditReply from './EditReply';
import Like from '../likes/Likes';
export default {
    props:['data','index'],
    components:{EditReply,Like},
    data(){
        return{
            editing:false
        }
    },
     computed:{
        own(){
            return User.own(this.data.user_id);
        }
    },
    created(){
        this.listen();
    },
    methods:{
        destroy()
        {
            EventBus.$emit('deleteReply',this.index)
            
        },
        edit(){
            this.editing = true;
        },
        listen(){
            EventBus.$on('cancelEidting', ()=>{
                this.editing = false
            })
        }
    },
   
}
</script>