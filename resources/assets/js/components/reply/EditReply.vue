<template>
    <v-container>
        <vue-simplemde v-model="reply.reply" ref="markdownEditor" />
                

        <v-card-actions >
            <v-btn icon color="green"  @click="update()">
                <v-icon>save</v-icon>
            </v-btn>
            <v-btn icon color="red" @click="cancel()">
                <v-icon>cancel</v-icon>
            </v-btn>
        </v-card-actions>
    </v-container>
</template>
<script>
export default {
    props:['reply'],

    methods:{
        cancel(){
            EventBus.$emit('cancelEidting')
        },
        update() {
            axios.patch(`/api/questions/${this.reply.question_slug}/replies/${this.reply.id}`)
            .then(this.cancel())
            .catch(error => console.log(error))
        },
        
    }
}
</script>