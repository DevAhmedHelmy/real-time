<template>
    <show-question :data = question></show-question>
</template>

<script>
import ShowQuestion from './ShowQuestion';
export default {
    components:{ShowQuestion},
    data(){
        return{
            question:{}
        }
    },
    
    created(){
          
        axios.get('/api/questions/'+this.$route.params.slug)
        .then(res => this.question = res.data.data)
        .catch(function (error) {
                // handle error
                console.log(error);
            })
    }
}
</script>