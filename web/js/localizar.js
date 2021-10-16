let lat;
let lon;

function getLocation(){
    if(navigator.geolocation)
    navigator.geolocation.getCurrentPosition((pos)=>{
        lat = document.getElementById('lat').innerText = pos.coords.latitude;
        lon = document.getElementById('lon').innerText = pos.coords.longitude;
        let url = `https://www.google.com/maps/embed/v1/place?key=AIzaSyCAcV6JSwmuPsbOtY7qHrAS6Xf6dORB16k&q=${lat}+${lon}`
        document.querySelector('.map').src = url
    });
}

getLocation()



