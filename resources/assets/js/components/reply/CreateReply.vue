<template>
    <v-container>
        <div class="mt-3">
            <vue-simplemde v-model="form.body" ref="markdownEditor" />
        

            <v-btn class="mr-4" @click="submit" type="submit" dark color="green">
                Reply
            </v-btn>
        </div>
    </v-container>
    
</template>

<script>
export default {
    props:['questionSlug'],
    data(){
        return{
            form:{
                body:''
            }
            
        }
    },
    methods:{
        submit(){
            axios.post(`/api/questions/${this.questionSlug}/replies`, {body:this.form.body})
            .then(res=>{
                this.form.body = ''
                EventBus.$emit('newReply', res.data.reply)
            })
            .catch(error => console.log(error))

        }
    }
}
</script>