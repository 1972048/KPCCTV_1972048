const dbVersion="v2";
const videoCollection="videos";
const adminCollection="admins";

class ApiService{
    static get dbVersion(){
        return dbVersion;
    }

    static get videoCollection(){
        return videoCollection;
    }
    
    static get adminCollection(){
        return adminCollection;
    }
}