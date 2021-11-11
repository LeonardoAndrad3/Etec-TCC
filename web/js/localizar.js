let lat;
let lon;

function getLocation(){
    if(navigator.geolocation)
    navigator.geolocation.getCurrentPosition((pos)=>{
        lat = pos.coords.latitude;
        lon = pos.coords.longitude;
        let url = `https://www.google.com/maps/embed/v1/place?key=AIzaSyCAcV6JSwmuPsbOtY7qHrAS6Xf6dORB16k&q=${lat}+${lon}`;
        let urlMaps = `https://www.google.com.br/maps/place/${lat},+${lon}`;
        document.querySelector('.map').src = url;
        document.querySelector('.link').onclick= urlMaps;
    });
}

getLocation()