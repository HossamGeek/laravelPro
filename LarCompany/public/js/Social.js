
window.addEventListener('load', doitfirst);


function doitfirst() {
    map = document.getElementById('map');
    mapLable = document.getElementById('mapLable');
}
function getmyposition() {
    // 1- check availaiblity of geolocation in navigator
    if(navigator.geolocation)
    {
        // get permission
        navigator.geolocation.getCurrentPosition(getposition, errorhandeler);
    }
    else
    {
        // geolocation not availaible
        map.innerText = 'Sorry , Update your brwoser and try Agian !!';
    }
}

function getmy() {
    // 1- check availaiblity of geolocation in navigator
    if(navigator.geolocation)
    {
        // get permission
        navigator.geolocation.getCurrentPosition(mapLable.value, errorhandeler);
        mapLable.value ="";
        navigator.geolocation.getCurrentPosition(getposition, errorhandeler);

    }
    else
    {
        // geolocation not availaible
        map.innerText = 'Sorry , Update your brwoser and try Agian !!';
    }
}


function getposition(position) {

    // console.log(position);
    lat = position.coords.latitude;
    lon = position.coords.longitude;

    // 1- create LATLON google object
    mylocation = new google.maps.LatLng(lat, lon);
    // 2- create attributes for returned image
    myattributes = { zoom: 17, center: mylocation , mapTypeId: google.maps.MapTypeId.ROADMAP};
    var myimg = new Image();
    myimg.src = new google.maps.Map(map, myattributes);
    var maps = new google.maps.Map(map, myattributes);
    // TestMarker();
    map.appendChild(myimg);
    var marker = new google.maps.Marker({
        position:mylocation,
        map: maps,
        draggable: true,
        title:"Hello World!"
    });
    marker.addListener('drag', function() {
        mapLable.value=marker.getPosition();
    });




    //latllon = lat + ' , ' + lon;
    //    map.innerText = latllon;
}
function errorhandeler(error)
{
    switch(error.code)
    {
        case error.PERMISSION_DENIED:
            map.innerText = 'PERMISSION_DENIED';
            break;
        case error.POSITION_UNAVAILABLE:
            map.innerText = 'POSITION_UNAVAILABLE';
            break;
        case error.TIMEOUT:
            map.innerText = 'TIMEOUT';
            break;
        case error.UNKOWN_ERROR:
            map.innerText = 'UNKOWN_ERROR';
            break;
    }
}


function TestMarker() {
    mylocation= new google.maps.LatLng(lat, lon);
    addMarker(mylocation);
}