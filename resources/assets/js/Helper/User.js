import Token from './Token';
import AppStoreage from './AppStorage';
class User
{
    login(data){
     
        axios.post('/api/auth/login',data)
          .then(res => this.responseAfterLogin(res))
          .catch(function (error) {
            console.log(error);
          })
    }

   

    responseAfterLogin(res){
        const access_token = res.data.access_token;
        const username = res.data.user;
        
        if(Token.isValid(access_token)){
            AppStoreage.store(username,access_token);
            window.location = '/forum';
        }
    }

    hasToken(){
        const storedToken = AppStoreage.getToken();
        
        if(storedToken){
            return Token.isValid(storedToken) ? true : false;
        }

        return false;
    }
    loggedIn()
    {
        return this.hasToken();
        
    }

    logout()
    {
        AppStoreage.clear();
        window.location = '/forum';
    }

    name()
    {
        if(this.loggedIn())
        {
            AppStoreage.getUser();
        }
    }
    id()
    {
        const payload = Token.payload(AppStoreage.getToken());
        return payload.sub;
    }
    own(id)
    {
        return this.id() == id
    }
    admin()
    {
        return this.id() == 11
    }
}
export default User = new User();