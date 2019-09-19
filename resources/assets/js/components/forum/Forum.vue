<template>
    <v-container>
        <v-layout>
            <v-flex xs8>
                hhshshhs
            </v-flex>
        </v-layout>
    </v-container>



</template>
<script>
import Question from './Question';
export default {
    components:{Question},
    data(){
        return{
            questions:{}
        }
    },
    created(){
            // Make a request for a user with a given ID
            axios.get('api/questions')
            .then( res => this.questions = res.data.data )
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            
        }
}
</script>

 