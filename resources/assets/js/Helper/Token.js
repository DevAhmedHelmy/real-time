class Token{

    isVaid(token){
        const payload = Json.parse(atob(token));
        if(payload){
            return payload.iss = "http//localhost:8000/api/auth/login" ? true : false;  
        }
        return false;
    }
    payload(token){
        const payload = token.split('.')[1];
        console.log(this.decode(payload));
    }

    decode(payload){
        return Json.parse(atob(payload))
    }
}

export default Token = new Token();