import Token from './Token';
import AppStoreage from './AppStorage';
class User
{
    login(data){
     
        axios.post('/api/auth/login',data)
          .then(res => this.responseAfterLogin(res))
          .catch(error => console.log(error.response.data.errors) );
    }

    responseAfterLogin(res){
        const access_token = res.data.access_token;
        const username = res.data.user;
        
        if(Token.isValid(access_token)){
            AppStoreage.store(access_token,username);
        }
    }

    hasToken(){
        const storedToken = AppStoreage.getToken();

        if(storedToken){
            return Token.isValid(storedToken) ? true : false;
        }

        return false;
    }
}
export default User = new User();