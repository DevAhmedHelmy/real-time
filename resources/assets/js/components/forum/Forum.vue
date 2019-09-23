<template>

    <v-container fluid grid-list-md>
        <v-layout row wrap>
            <v-flex xs8>
                 <question v-for="question in questions" 
                    :key="question.path" 
                    :data=question
                 ></question>
            

                
            </v-flex>
            <v-flex xs4>
                <app-sidebar></app-sidebar>
            </v-flex>
        </v-layout>


    </v-container>
</template>

<script>
import Question from './Question';
import AppSidebar from './AppSidebar';
export default {
    components:{Question,AppSidebar},
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

 