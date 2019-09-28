<template>
    <v-container>
        <reply v-for="(reply, index) in content" :key="reply.id" v-if="question" :index=index :data="reply"></reply>
    </v-container>
    
</template>
<script>
import Reply from './Reply';
export default {
    components:{Reply},

    props:['question'],

    data() {
        return {
            content:this.question.replies
        }
    },
    created(){
        this.lisent()
    },
    
    methods:{
        lisent(){
            EventBus.$on('newReply',(reply)=>{
                this.content.unshift(reply)
            })
            EventBus.$on('deleteReply',(index)=>{

                axios.delete(`/api/questions/${this.question.slug}/replies/${this.content[index].id}`)
                .then(res=>{
                    this.content.splice(index,1)
                }).catch(error => console.log(error))
                
            })

            Echo.private('App.User.' + User.id())
                .notification((notification) => {
                    this.content.unshift(notification.reply)
                });

            Echo.channel('DeleteReplyChannel')
                .listen('DeleteReplyEvent', (e) => {
                   for(let i = 0; i< this.content.length; i++)
                   {
                       if(this.content[i].id == e.id){
                           this.content.splice(i,1)
                       }
                   }
                });
        }
    }
}
</script>