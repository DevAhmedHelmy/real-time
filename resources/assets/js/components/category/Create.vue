<template>
    <v-container>
        <!-- create new category -->
        <v-card class="pb-2">
            <v-toolbar color="green" dark dens class="mt-2">
             
                <v-toolbar-title>
                    Create New Category
                </v-toolbar-title>
            </v-toolbar>
            <v-form @submit.prevent="submit" class="ml-2">
                <v-text-field
                    v-model="form.name"
                    label="Category Name"
                    type="text"
                    required
                ></v-text-field>
                <span class="text--red" v-if="errors.name">{{errors.name[0]}}</span>
                <v-btn class="mr-4" type="submit" color="pink" v-if="editSlug">Update</v-btn>
                <v-btn class="mr-4" type="submit" color="teal" v-else>Create</v-btn>
            </v-form>
        </v-card>

        <!-- to view all categories -->
        <v-card>
        <v-toolbar color="indigo" dark dens class="mt-4">
             
            <v-toolbar-title>
                All Categories
            </v-toolbar-title>
        </v-toolbar>
        <v-list >
            <div v-for="(category,index) in categories" :key="category.id">
                <v-list-item>
                 
                    <v-list-item-content>
                            <v-list-item-title>{{category.name}}</v-list-item-title>
                    </v-list-item-content>
                    
                    <v-list-item-icon>
                          <v-btn dark icon>
                            <v-icon color="green" @click="edit(index)">edit</v-icon>
                        </v-btn>
                        <v-btn dark icon>
                            <v-icon color="red" @click="destroy(category.slug,index)">delete</v-icon>
                        </v-btn>
                        
                    </v-list-item-icon>
                
                </v-list-item>
                <v-divider></v-divider>
            </div>
            
            
        </v-list>
            
        
    </v-card>
    </v-container>
</template>
    
    
<script>
export default {
    data(){
        return{
            form:{
                name : ''
            },
            errors:{},
            categories:{},
            editSlug:null
        }
        
    },
    created(){
        if(!User.admin())
        {
            this.$router. push('/forum')
        }
        axios.get('api/categories')
        .then(res =>this.categories = res.data.data)
        .catch(function (error) {
                // handle error
                console.log(error);
            })
    },
    methods:{
        submit(){
            this.editSlug ? this.update() : this.create()
            
        },
        create(){
            axios.post('api/categories',this.form)
            .then(res=>{
                this.categories.unshift(res.data)
                this.form.name =null
                })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
        },
        update(){
            axios.patch(`/api/categories/${this.editSlug}`,this.form)
            .then(res=>{
                this.categories.unshift(res.data)
                this.form.name =null
                })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
        },
        destroy(slug,index){
            axios.delete(`/api/categories/${slug}`)
            .then(res => this.categories.splice(index, 1))
            .catch(error=> console.log(error.response.data));
        },
        edit(index)
        {
            this.form.name = this.categories[index].name
            this.editSlug = this.categories[index].slug
            this.categories.splice(index, 1)
        }
    },
    
}
</script>
