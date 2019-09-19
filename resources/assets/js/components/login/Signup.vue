<template>
<v-container>


  <v-form @submit.prevent="signup">
    <v-text-field
      v-model="form.name"
      :error-messages="nameErrors"
      label="name"
      type="text"
      required
      @input="$v.name.$touch()"
      @blur="$v.name.$touch()"
    ></v-text-field>

    <!-- email field -->
    <v-text-field
      v-model="form.email"
      :error-messages="emailErrors"
      label="E-mail"
      required
      @input="$v.email.$touch()"
      @blur="$v.email.$touch()"
    ></v-text-field>
    <!-- password field -->
    <v-text-field
      v-model="form.password"
      :error-messages="passwordErrors"
      label="password"
      type="password"
      required
      @input="$v.password.$touch()"
      @blur="$v.password.$touch()"
    ></v-text-field>

    <!-- password password_confirmation -->
    <v-text-field
      v-model="form.password_confirmation"
      :error-messages="passwordErrors"
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
      nameErrors () {
        const errors = []
        if (!this.$v.name.$dirty) return errors
        !this.$v.name.name && errors.push('Must be valid Name')
        !this.$v.name.required && errors.push('Name is required')
        return errors
      },
    },

    methods: {
      submit () {
        this.$v.$touch()
      },
      
      signup(){
          
          User.signup(this.form);

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