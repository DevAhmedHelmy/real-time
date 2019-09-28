<template>
<v-container>


  <v-form @submit.prevent="create">
    
    <v-text-field
      v-model="form.title"
      label="Title"
      type="text"
      required
    ></v-text-field>
    <v-select
        :items="categories"
        item-value="id"
        item-text="name"
        
        v-model="form.category_id"
        label="Category"
        solo
        
    ></v-select>
    <vue-simplemde v-model="form.body" ref="markdownEditor" />
     

    <v-btn class="mr-4" type="submit">Create</v-btn>
    
     
  </v-form>
  </v-container>
</template>

<script>
export default {
    data(){

        return{
            form:{
                title:'',
                category_id:'',
                body:''
            },
            categories:{},
            errors:{}
        }
    },
    created(){
        axios.get('api/categories')
        .then(res =>this.categories = res.data.data)
        .catch(function (error) {
                // handle error
                console.log(error);
            })
    },
    methods :{
        create(){
          
         axios.post('/api/questions',this.form)
<<<<<<< HEAD
 
          .then(res => {
                  console.log(res.data) 
                  this.$router.push('forum')
              })
 
          .then(res => this.$router.push(res.data.path))
 
=======
          .then(res => this.$router.push(res.data.path))
>>>>>>> eb0c17fe12cb27d1ac980b3997df60e7b771451c
          .catch(error=>this.errors = error.response.data.errors)

      },
      
    }
}
</script>