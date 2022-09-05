'use strict';

function initMap(){  
    let url = new URL(window.location.href);
    let id = url.searchParams.get("id");
    fetch(`/controllers/details_controller.php?id=${id}`).then((res) => res.json())
          .then((res) =>{
            
            let coords = res[0].Address.split(', ');
            let lat = Number(coords[0]);
            let lng = Number(coords[1]);

            if(!lat){
                let map = document.getElementById('map');
                map.style.height = '0px';
                let address = document.getElementById('address');
                address.append(' No address');
            }else{

            var pos = {lat: lat, lng: lng};
            var myLatlng = new google.maps.LatLng(pos);
            var mapOptions = {
            zoom: 4,
            center: myLatlng
            }
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);
    
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
            });
        }
    })

  
}
