<div id="content" class="hide">
    <button class="buttonx" onclick="hideMenu()"><div> X </div></button>
    <div id="contents">
        <div class="content_left">
            <div id="map"></div>
        </div>
        <div class="content_right">
            <input type="text" id="input" onkeyup="search()" placeholder="Search" title="Type in a name">
            <div id="video"></div>
        </div>
    </div>
</div>
<button id="adds" onclick="showMenu()"><div id="add">+</div></button>
<center><div id="videos"></div></center>
<script>
    window.onload = function(){
        var check=0;
        fetchAllVideo(videos=>{
            var video = document.querySelector("#video");
            var vids = document.querySelector("#videos");
            var maps = document.querySelector("#map");
            var button = document.querySelector("#adds");
            videos.forEach(val => {
                const div = document.createElement("div");
                const divs = document.createElement("button");
                divs.innerHTML = "Video";
                divs.className = "vid";
                divs.addEventListener('click', () => {
                    if(document.getElementById(val.id)==null&&document.getElementsByTagName("video").length<4){
                        const vid = document.createElement("video");
                        vid.setAttribute("id",val.id);
                        vid.setAttribute("preload","auto");
                        vid.setAttribute("controls",true);
                        vid.setAttribute("autoplay",true);
                        vid.setAttribute("muted",true);
                        vid.setAttribute("data-setup",'{}');
                        vid.className = "video-js vjs-layout-tiny vjs-default-skin block";
                        var source = document.createElement('source');
                        source.src = val.links;
                        source.type = "application/x-mpegURL";
                        vid.appendChild(source);
                        vids.appendChild(vid);
                        var player=videojs(val.id);
                        const players = document.getElementById(val.id);
                        const divs = document.createElement("button");
                        divs.innerHTML = "CLICK THIS BAR TO CLOSE VIDEO";
                        divs.className = "vjs-control-bar buttonx";
                        divs.addEventListener('click',() =>{
                            player.dispose();
                            if(document.getElementsByTagName("video").length<4){   
                                button.className="";
                            }
                        })
                        players.append(divs);
                        var menu = document.querySelector("#content");
                        menu.className="hide";
                        vids.className="";
                        if(document.getElementsByTagName("video").length<4){   
                            button.className="";
                        }
                    }
                });
                if(val.long!=""&&val.lat!=""){
                    div.innerHTML = val.name;
                    div.className = "button";
                    div.onclick = function(){
                        maps.scrollIntoView();
                        map.setCenter([val.long,val.lat]);
                        map.setZoom(20);
                    }
                    div.appendChild(divs);
                    video.appendChild(div);
                    const marker = new mapboxgl.Marker({"color": "#000000"}).setLngLat([val.long,val.lat]).addTo(map);
                    txt = document.createElement("div");
                    txt.innerHTML = val.name;
                    txt.className = "txt";
                    marker.getElement().appendChild(txt);
                    marker.getElement().addEventListener('click', () => {
                        if(document.getElementById(val.id)==null&&document.getElementsByTagName("video").length<4){
                            const vid = document.createElement("video");
                            vid.setAttribute("id",val.id);
                            vid.setAttribute("preload","auto");
                            vid.setAttribute("controls",true);
                            vid.setAttribute("autoplay",true);
                            vid.setAttribute("muted",true);
                            vid.setAttribute("data-setup",'{}');
                            vid.className = "video-js vjs-layout-tiny vjs-default-skin block";
                            var source = document.createElement('source');
                            source.src = val.links;
                            source.type = "application/x-mpegURL";
                            vid.appendChild(source);
                            vids.appendChild(vid);
                            var player=videojs(val.id);
                            const players = document.getElementById(val.id);
                            const divs = document.createElement("button");
                            divs.innerHTML = "CLICK THIS BAR TO CLOSE VIDEO";
                            divs.className = "vjs-control-bar buttonx";
                            divs.addEventListener('click',() =>{
                                player.dispose();
                                if(document.getElementsByTagName("video").length<4){   
                                    button.className="";
                                }
                            })
                            players.append(divs);
                            var menu = document.querySelector("#content");
                            menu.className="hide";
                            vids.className="";
                            if(document.getElementsByTagName("video").length<4){   
                                button.className="";
                            }
                        }
                    });
                }
            });
        });
    }

    function showMenu(){
        var menu = document.querySelector("#content");
        menu.className="";
        var vids = document.querySelector("#videos");
        vids.className="hide";
        var button = document.querySelector("#adds");
        button.className="hide";
        var maps = document.querySelector("#map");
        map.resize();
    }

    function hideMenu(){
        var menu = document.querySelector("#content");
        menu.className="hide";
        var vids = document.querySelector("#videos");
        vids.className="";
        var button = document.querySelector("#adds");
        button.className="";
        var maps = document.querySelector("#map");
    }

    function search() {
        var input, filter, divm, divs, div, i, txtValue;
        input = document.getElementById("input");
        filter = input.value.toUpperCase(); 
        divm = document.getElementById("video");
        divs = divm.getElementsByTagName("div");
        for (i = 0; i < divs.length; i++) {
            div = divs[i];
            txtValue = div.textContent || div.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                divs[i].style.display = "";
            } else {
                divs[i].style.display = "none";
            }
        }
    }

	mapboxgl.accessToken = 'pk.eyJ1IjoiMTk3MjA0OCIsImEiOiJjbDMzcDZjZmUybDYwM25wZnI4enhxazdtIn0.H5XJ7ai_VtndnKvZrvDv2g';
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/dark-v10',
        center: [107.61356619636834,-6.9158237298845275],
        zoom: 11.15
    });

    map.on('load', () => {
        map.addLayer({
            'id': 'places',
            'type': 'symbol',
            'source': 'places',
            'layout': {
                'icon-image': '{icon}',
                'icon-allow-overlap': true
            }
        });
    });
</script>