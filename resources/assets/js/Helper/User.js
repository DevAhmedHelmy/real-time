import Token from './Token';
import AppStoreage from './AppStorage';
class User
{
    login(data){
        axios.post('/api/auth/login',data)
          .then(res =>this.responseAfterLogin(res))
          .catch(error => console.log(error.response.data) );
    }

    responseAfterLogin(res){
        const access_token = res.data.access_token;
    }
}
export default User = new User();