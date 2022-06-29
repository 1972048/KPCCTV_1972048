function login(username,password,callback){
    let db=firebase.database().ref(ApiService.dbVersion).child(ApiService.adminCollection).child(username);
    db.once('value',function(snap){
        if(snap.exists()){
            callback(snap.val());
        }
    });
    document.getElementById('formLogin').reset();
}

function addAdmin(username,password){
    let newAdmin={
        username: username,
        password: password
    }
    firebase.database().ref(ApiService.dbVersion).child(ApiService.adminCollection).child(username).set(newAdmin);
    document.getElementById('formLogin').reset();
}

function addNewVideo(name,links,long,lat){
    let newVideo={
        name: name,
        links: links,
        long: long,
        lat: lat
    }
    firebase.database().ref(ApiService.dbVersion).child(ApiService.videoCollection).push(newVideo);
    // document.getElementById('formvideo').reset();
}

function addNewVideos(id,name,links,long,lat){
    let newVideo={
        name: name,
        links: links,
        long: long,
        lat: lat
    }
    firebase.database().ref("v3").child(ApiService.videoCollection).child(id).set(newVideo);
}

function fetchAllVideo(callback){
    let db=firebase.database().ref(ApiService.dbVersion).child(ApiService.videoCollection);
    db.on('value',function(snap){
        if(snap.exists()){
            let arr=[];
            snap.forEach(function(childSnap){
                let videos={'id':childSnap.key, 'name':childSnap.val().name, 'links':childSnap.val().links, 'long':childSnap.val().long, 'lat':childSnap.val().lat};
                arr.push(videos);
            });
            callback(arr);
        }
    });
}

function deleteVideo(id){
    let con= window.confirm("Delete video?");
    if (con){
        firebase.database().ref(ApiService.dbVersion).child(ApiService.videoCollection).child(id).remove();
    }
}

function editVideo(id){
    window.location="indexadmin.php?mn=up&did="+id;
}

function fetchVideo(id,callback){
    let db=firebase.database().ref(ApiService.dbVersion).child(ApiService.videoCollection).child(id);
    db.once('value',function(snap){
        if(snap.exists()){
            callback(snap.val());
        }
    });
}

function updateVideo(id,name,links,long,lat){
    let updateData= {
        name:name,
        links:links,
        long: long,
        lat: lat
    }
    firebase.database().ref(ApiService.dbVersion).child(ApiService.videoCollection).child(id).set(updateData);
}

