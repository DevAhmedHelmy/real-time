<template>
<v-container>


  <v-form @submit.prevent="login">
    
    <v-text-field
      v-model="form.email"
      :error-messages="emailErrors"
      label="E-mail"
      required
      @input="$v.email.$touch()"
      @blur="$v.email.$touch()"
    >
    </v-text-field>
    <v-text-field
      v-model="form.password"
      :error-messages="passwordErrors"
      label="password"
      type="password"
      required
      @input="$v.password.$touch()"
      @blur="$v.password.$touch()"
    ></v-text-field>
     

    <v-btn class="mr-4" type="submit">submit</v-btn>
    <v-btn @click="clear">clear</v-btn>
    <router-link to="/signup">
          <v-btn color="blue">signup</v-btn>
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
      password: { required, minLength: minLength(4) },
      email: { required, email },
       
    },

    data() {
        return {
            form:{
                email: '',
                password:''
            }
        }
      
       
    },

    computed: {
       
       
      passwordErrors () {
        const errors = []
        if (!this.$v.password.$dirty) return errors
        !this.$v.password.maxLength && errors.push('password min be at most 4 characters long')
        !this.$v.password.required && errors.push('password is required.')
        return errors
      },
      emailErrors () {
        const errors = []
        if (!this.$v.email.$dirty) return errors
        !this.$v.email.email && errors.push('Must be valid e-mail')
        !this.$v.email.required && errors.push('E-mail is required')
        return errors
      },
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
      login(){
          
          User.login(this.form);
          this.$router.push({name:'forum'})

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