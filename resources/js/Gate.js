export default class Gate {

    constructor(user) {
        this.user = user;
    }

    isAdmin() {
        return this.user.type === 'admin';
    }

    isUser() {
        return this.user.type === 'pengelola';
    }
    isKepala() {
        return this.user.type === 'kepala LKSA';
    }

    isAdminOrUser(){
        if(this.user.type === 'admin' || this.user.type === 'pengelola'){
            return true;
        }
    }

    isAdminOrKepala(){
        if(this.user.type === 'admin' || this.user.type === 'kepala LKSA'){
            return true;
        }
    }

    isAdminOrUserOrKepala(){
        if(this.user.type === 'admin' || this.user.type === 'kepala LKSA' || this.user.type === 'pengelola' ){
            return true;
        }
    }
}
