<template>
    <v-container>
        <v-card>
            <v-form @submit.prevent="update">
                
                <v-text-field
                v-model="form.title"
                label="Title"
                type="text"
                required
                ></v-text-field>
                
                <vue-simplemde v-model="form.body" ref="markdownEditor" />
                

                <v-card-actions >
                    <v-btn icon color="green"  type="submit">
                        <v-icon>save</v-icon>
                    </v-btn>
                    <v-btn icon color="red" @click="cancel">
                        <v-icon>cancel</v-icon>
                    </v-btn>
                </v-card-actions>
                
                
            </v-form>
        </v-card>
    </v-container>
  
</template>
<script>
export default {
    props:['data'],
    data(){
        return{
            form:{
                tile:'',
                body:''
            }
        }
    },
    methods:{
        cancel(){
            EventBus.$emit('cancelEditing')
        },
        update(){
            axios.patch(`/api/questions/${this.form.slug}`,this.form)
            .then(res => this.cancel())
            .catch()
        }
    },
    mounted(){
        this.form = this.data
    }
}
</script>