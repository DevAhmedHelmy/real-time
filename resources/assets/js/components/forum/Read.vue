<template>
<div v-if="question">
    <edit-question v-if="editing" :data = question ></edit-question>
     
    <show-question v-else :data = question ></show-question>
    <v-container>
        <replies :question="question"></replies>
        <new-reply :questionSlug="question.slug"></new-reply>
    </v-container>
    
</div>
    
</template>

<script>
import editQuestion from './editQuestion';
import ShowQuestion from './ShowQuestion';
import Replies from '../reply/Replies';
import NewReply from '../reply/CreateReply';
export default {
    components:{editQuestion,ShowQuestion,Replies,NewReply},
    data(){
        return{
            editing:false,
            question:null
        }
    },
    
    created(){
          
        this.listen()
        this.getQuestions()
    },
    methods:{
        listen(){
            EventBus.$on('startEditing',()=>{
                this.editing = true;
            })
            EventBus.$on('cancelEditing',()=>{
                this.editing = false;
            })
        },
        getQuestions()
        {
            axios.get('/api/questions/'+this.$route.params.slug)
        .then(res => this.question = res.data.data)
        .catch(function (error) {
                // handle error
                console.log(error);
            })
        }
    }
}
</script>