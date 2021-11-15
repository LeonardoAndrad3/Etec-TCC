let lat;
let lon;

function getLocation(){
    if(navigator.geolocation)
    navigator.geolocation.getCurrentPosition((pos)=>{
        lat = pos.coords.latitude;
        lon = pos.coords.longitude;
        let url = `https://www.google.com/maps/embed/v1/place?key=AIzaSyCAcV6JSwmuPsbOtY7qHrAS6Xf6dORB16k&q=${lat}+${lon}`;
        document.querySelector('.map').src = url;
    });
}

function direcionarMaps(){
    let urlMaps = `https://www.google.com.br/maps/place/${lat},+${lon}`;
    window.location.href = urlMaps;
}

getLocation()