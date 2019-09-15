class AppStorage{

    // function to store token
    storeToken(token)
    {
        localStorage.setItem('token' ,token)
    }

    // function to store user
    storeUser(user)
    {
        localStorage.setItem('user', user);
    }

    store(user,token)
    {
        this.storeToken(token);
        this.storeUser(user);
    }

    // when logout will remove data
    clear()
    {
        localStorage.removeItem('token');
        localStorage.removeItem('user');
    }

    getToken()
    {
        return localStorage.getItem('token');
    }

    getUser()
    {
        return localStorage.getItem('user');
    }
}

export default AppStorage = new AppStorage();