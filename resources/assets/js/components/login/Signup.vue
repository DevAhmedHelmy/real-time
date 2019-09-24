<template>
<v-container>


  <v-form @submit.prevent="signup">
    <v-text-field
      v-model="form.name"
       
      label="name"
      type="text"
      required
      @input="$v.name.$touch()"
      @blur="$v.name.$touch()"
    ></v-text-field>
    <span class="text--red" v-if="errors.name">{{errors.name[0]}}</span>

    <!-- email field -->
    <v-text-field
      v-model="form.email"
       
      label="E-mail"
      required
      @input="$v.email.$touch()"
      @blur="$v.email.$touch()"
    ></v-text-field>
    <span class="text--red" v-if="errors.email">{{errors.email[0]}}</span>
    <!-- password field -->
    <v-text-field
      v-model="form.password"
       
      label="password"
      type="password"
      required
      @input="$v.password.$touch()"
      @blur="$v.password.$touch()"
    ></v-text-field>
<span class="text--red" v-if="errors.password">{{errors.password[0]}}</span>
    <!-- password password_confirmation -->
    <v-text-field
      v-model="form.password_confirmation"
       
      label="password"
      type="password"
      required
      @input="$v.password.$touch()"
      @blur="$v.password.$touch()"
    ></v-text-field>
     
    <!-- submit -->
    <v-btn class="mr-4" type="submit">Sign Up</v-btn>
    <v-btn @click="clear">clear</v-btn>
    <router-link to="/login">
          <v-btn color="blue">Login</v-btn>
        </router-link>
  </v-form>
  </v-container>
</template>
<script>
  import { validationMixin } from 'vuelidate'
  import { required, maxLength, minLength, email } from 'vuelidate/lib/validators'

  export default {
    mixins: [validationMixin],

    validations: {
        name: { required, minLength: minLength(4) },
        password: { required, minLength: minLength(4) },
        email: { required, email },
       
    },

    data() {
        return {
            form:{
                name: '',
                email: '',
                password:'',
                password_confirmation: '',
            },
            errors:{}
        }
        
      
       
    },
    created(){
      if(User.loggedIn()){
        this.$router.push('forum')
      }
    },
    
    methods: {
      submit () {
        this.$v.$touch()
      },
      
      signup(){
          
         axios.post('/api/auth/signup',this.form)
          .then(res => {
              User.responseAfterLogin(res)
              this.$router.push('forum')
              })
          .catch(error=>console.log(error))

      },
      clear () {
        this.$v.$reset()
        this.name = ''
        this.email = ''
        this.select = null
        this.checkbox = false
      },
    },
  }
</script>