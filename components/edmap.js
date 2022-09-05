'use strict';

function initMap(){


    let url = new URL(window.location.href);
    
    let coords = url.searchParams.get("address");
    let arr = coords.split(', ');
    let lat = Number(arr[0]);
    let lng = Number(arr[1]);

    if(!lat){

        var pos = {lat:50.8732825, lng: 34.8264656};
        var myLatlng = new google.maps.LatLng(pos);
        var mapOptions = {
        zoom: 4,
        center: myLatlng
        }
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
        
        let infoWindow = new google.maps.InfoWindow({
            content: "Сlick on the place where the conference will be",
            position: myLatlng,
          });
        
          infoWindow.open(map);
        
          map.addListener("click", (mapsMouseEvent) => {
            infoWindow.close();
            
            infoWindow = new google.maps.InfoWindow({
              position: mapsMouseEvent.latLng,
            });
            let lat = mapsMouseEvent.latLng.lat();
            let lng = mapsMouseEvent.latLng.lng();
            console.log(lat, lng);
    
            let address = document.getElementById('address');
            address.value = `${lat}, ${lng}`;
     
            infoWindow.setContent(
              'Сonference place'
            );
            infoWindow.open(map);
          });

    } else {

        let address = document.getElementById('address');
        address.value = `${lat}, ${lng}`;

        var pos = {lat:lat, lng: lng};
        var myLatlng = new google.maps.LatLng(pos);
        var mapOptions = {
        zoom: 4,
        center: myLatlng
        }
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
        
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            draggable: true
        });
        
        marker.addListener("mouseup", () => {
            let lat = marker.position.lat();
            let lng = marker.position.lng();

            address.value = `${lat}, ${lng}`;
        });
    }
     
}